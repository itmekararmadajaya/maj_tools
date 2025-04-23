<?php

namespace App\Http\Controllers;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;
use Illuminate\Http\Request;

class QrGeneratorController extends Controller
{
    public function index(){
        return view('qr_generator.index');
    }

    public function generate(Request $request){
        $validated = $request->validate([
            'text' => 'required|string'
        ]);

        $writer = new PngWriter();

        // Create QR code
        $qrCode = new QrCode(
            data: $request->text,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        $result = $writer->write($qrCode);

        // Stream ke browser sebagai PNG
        header('Content-Type: ' . $result->getMimeType());
        header('Content-Disposition: attachment; filename="qrcode.png"');
        echo $result->getString();
    }
}
