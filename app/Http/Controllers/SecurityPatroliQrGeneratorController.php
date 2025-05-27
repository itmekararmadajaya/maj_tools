<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class SecurityPatroliQrGeneratorController extends Controller
{
    public function index(){
        $master_data_checkpoint = fopen('http://10.30.20.115/sapdata/checkpointsecurity.csv', 'r');
        while (($data = fgetcsv($master_data_checkpoint, 1000, ";")) !== FALSE) {
            $checkpoint[] = $data; 
        }
        fclose($master_data_checkpoint);

        $checkpoints = [];
        foreach($checkpoint as $data){
            $checkpoints[] = [
                'value' => $data[0].'-'.$data[2],
                'description' => $data[0] .'-'. $data[2] .'-'. $data[3]
            ];
        }
        unset($checkpoints[0]);
        
        return view('security_patroli.qr_generator.index', [
            'checkpoints' => $checkpoints
        ]);
    }

    public function generate(Request $request){
        $validated = $request->validate([
            'pos' => 'required|string',
            'type' => 'required|string'
        ]);

        return redirect()->route('security-patroli-template', [
            'pos' => $validated['pos'],
            'type' => $validated['type'],
        ]);
    }

    public function template(Request $request){
        $request->validate([
            'pos' => 'required|string',
            'type' => 'required|string'
        ]);

        $master_data_checkpoint = fopen('http://10.30.20.115/sapdata/checkpointsecurity.csv', 'r');
        while (($data = fgetcsv($master_data_checkpoint, 1000, ";")) !== FALSE) {
            $checkpoints[] = $data; 
        }
        fclose($master_data_checkpoint);

        $key = explode('-', $request->pos);
        $final_data = [];
        foreach($checkpoints as $checkpoint){
            if($checkpoint[0] == $key[0] && $checkpoint[2] == $key[1]){
                $final_data = [
                    'location' => $checkpoint[0],
                    'object_name' => $checkpoint[1],
                    'ttk_ptrl' => $checkpoint[2],
                    'keterangan' => $checkpoint[3],
                    'changed_on' => $checkpoint[4]
                ];
            }
        }

        $writer = new PngWriter();

        // Create QR code
        $qrCode = new QrCode(
            data: $request->pos,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        $result = $writer->write($qrCode);

        return view('security_patroli.qr_generator.template', [
            'pos' => $request->pos,
            'final_data' => $final_data,
            'qr_code' => $result->getDataUri(),
            'type' => $request->type
        ]);
    }
}
