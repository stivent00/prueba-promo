<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntosGps; 

class FileController extends Controller
{
    public function uploadFile(Request $request)
    {
        // Validar que el archivo sea .txt
        $request->validate([
            'txtFile' => 'required|mimes:txt|max:10240',
        ]);

        // Obtener el archivo
        $file = $request->file('txtFile');
        $content = file_get_contents($file->getRealPath());

        // Procesar el archivo y extraer las líneas
        $lines = explode(PHP_EOL, $content);
        
        foreach ($lines as $line) {
            // Supongamos que los datos están separados por comas
            $data = explode(";", $line);
            // Data dispositivo
            $disp = explode(",", $data[0]);
            $modelo = $disp[0];
            $imei = $disp[1];
            $tiempo_disp = $disp[2];
            $vehiculo = explode(":", $disp[3]);
            $placa = $vehiculo[1];
            $version = $data[1];
            $longitud = $this->convertToDecimal(trim($data[4]));
            $latitud = $this->convertToDecimal(trim($data[5]));

            if (count($data) >= 2) {
                // Guardar los datos en la base de datos MySQL
                PuntosGps::create([
                    'modelo_dispositivo' => $modelo,
                    'imei' => $imei,
                    'tiempo_dispositivo' => $tiempo_disp,
                    'placa_vehiculo' => $placa,
                    'version_fimware' => $version,
                    'longitud' => $longitud,
                    'latitud' => $latitud
                ]);
            }
        }

        return redirect()->route('mapPage');
    }

    private function convertToDecimal($coordinate)
    {
        // Si la coordenada es positiva (N o E), devolvemos el valor tal cual
        if (strpos($coordinate, 'N') === 0 || strpos($coordinate, 'E') === 0) {
            return floatval(substr($coordinate, 1)); // Eliminar el primer carácter y devolver el valor como float
        }

        // Si la coordenada es negativa (S o W), devolvemos el valor como negativo
        if (strpos($coordinate, 'S') === 0 || strpos($coordinate, 'W') === 0) {
            return -floatval(substr($coordinate, 1)); // Eliminar el primer carácter, hacer negativo y devolver el valor como float
        }

        return null; // Si el formato es incorrecto, retornar null
    }

}
