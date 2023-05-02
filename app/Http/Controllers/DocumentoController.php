<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentoRequest;
use App\Models\Documento;
use App\Models\Radicado;
use DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentoController extends Controller
{

    /**
     * Visualiza el documento seleccionado
     *
     * @param  $documento_id
     */
    public function verDocumento($documento_id)
    {
        $documento = Documento::find($documento_id);

        return response()->file($documento->url);
    }

    /**
     * Cargar Documento
     *
     * @param  $documento_id
     */
    public function descargarDocumento($documento_id)
    {
        $documento = Documento::find($documento_id);
        return response()->download($documento->url);
        
    }

    /**
     * Cargar Documento
     *
     * @param  \App\Http\Requests\StoreDocumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentoRequest $request)
    {
        $max_size = (int) ini_get('upload_max_filesize') * 10240;
        $files = $request->file('files');
        //Indica la pagina de la cual viene el formulario con documentos o imagenes
        $option_view = $request->option_view;

        if ($option_view == "radicados") {
            $radicado_id = $request->radicado_id;
            $radicado = Radicado::find($radicado_id);

            if ($request->hasFile('files')) {

                foreach ($files as $file) {

                    $tipo = $file->getMimeType();
                    if ($tipo == "image/jpeg" || $tipo == "image/jpg" || $tipo == "image/png" || $tipo == "application/pdf") {

                        if (Storage::putFileAs("/public/radicados/" . $radicado->numero_radicado . '/documentos//', $file, $file->getClientOriginalName())) {
                            //$tipo = $file->getMimeType();
                            //$tipo2 = $file->getClientMimeType();
                            //return [$tipo, $tipo2];

                            //"image/jpeg"  ,"application/pdf"
                            //TODO:Consultar si el nombre puede repetirse o no para realizar el control
                            Documento::create([
                                'radicado_id' => $radicado_id,
                                'nombre' => $file->getClientOriginalName(),
                                'tipo' => $file->getMimeType(),
                                'url' => storage_path() . '/app/public/radicados/' . $radicado->numero_radicado . '/documentos//' . $file->getClientOriginalName(),
                            ]);
                        }
                    } else {
                        Alert::error('¡Error!', 'El tipo de archivo no es aceptado, documentos aceptados: pdf, jpg, png, jpeg');
                        return back();
                    }
                }
                Alert::success('¡Exito!', 'Archivo subido');
                return back();
            } else {
                Alert::error('¡Error!', 'Debe seleccionar por lo menos un archivo');
                return back();
            }
        } else
        if ($option_view == "inmuebles") {
            //tomamos las varibales que llegan en la solicitud
            $inmueble_id = $request->inmueble_id;
            $nombre_imagen = $request->nombre_imagen;

            //consultamos el radicado para acceder a la ruta en donde se guardaran las imagenes en el storage
            $radicado = DB::table('inmuebles')
                ->join('avaluos', 'avaluos.id', '=', 'inmuebles.avaluo_id')
                ->join('radicados', 'radicados.id', '=', 'avaluos.radicado_id')
                ->select(
                    'radicados.id as radicado_id',
                    'radicados.numero_radicado',
                    'avaluos.codigo as avaluo_codigo'
                )
                ->where('inmuebles.id', $inmueble_id)
                ->first();

                //return $request->nombre_imagen;
            if ($request->hasFile('files')) {

                foreach ($files as $file) {
                    //tomamos el tipo de documento para determinar si es pdf o img
                    $tipo = $file->getMimeType();
                    if ($tipo == "image/jpeg" || $tipo == "image/jpg" || $tipo == "image/png") {

                        if (Storage::putFileAs("/public/radicados/" . $radicado->numero_radicado . '/' . $radicado->avaluo_codigo . '/' , $file, $file->getClientOriginalName())) {
                      //if (Storage::putFileAs("/public/radicados/" . $radicado->numero_radicado . '/', $file, $file->getClientOriginalName())) {
                            //$tipo = $file->getMimeType();
                            //$tipo2 = $file->getClientMimeType();
                            //return [$tipo, $tipo2];

                            //"image/jpeg"  ,"application/pdf"
                            //TODO:Consultar si el nombre puede repetirse o no para realizar el control
                            Documento::create([
                                'radicado_id' => $radicado->radicado_id,
                                'inmueble_id' => $inmueble_id,
                                'nombre' => $file->getClientOriginalName(),
                                'nombre_imagen' => $request->nombre_imagen,
                                'tipo' => $file->getMimeType(),
                                'url' => storage_path() . '/app/public/radicados/' . $radicado->numero_radicado . '/' . $radicado->avaluo_codigo . '/' . $file->getClientOriginalName(),
                            ]);
                        }
                    } else {
                        Alert::error('¡Error!', 'El tipo de archivo no es aceptado, documentos aceptados: jpg, png, jpeg');
                        return back();
                    }
                }
                Alert::success('¡Exito!', 'Archivo subido');
                return back();
            } else {
                Alert::error('¡Error!', 'Debe seleccionar por lo menos un archivo');
                return back();
            }

        }
    }

    /**
     * Remueve del storage el documento seleccionado y lo borra de la base de datos
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $documento = Documento::find($documento->id);

        unlink($documento->url);
        $documento->delete();
        Alert::info('¡Exito!', 'Archivo eliminado');
        return back();
    }
}
