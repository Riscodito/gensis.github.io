<?php

session_start();

$apiKey = "AIzaSyAzVn1QcI3aYbYrjh4aqPTbWdRgXYTADoM";

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-exp:generateContent?key=" . $apiKey;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tenses = $_POST["tenses"];
    $subject = $_POST["subject"];
    $place = $_POST["place"];

    $data = [
        "contents" => [
            [
                "role" => "user",
                "parts" => [
                    [
                        "text" => "Buatkan 5 buah contoh kalimat $tenses sederhana, dengan menggunakan subjek $subject, dan keterangan tempatnya berkaitan di $place, catatan penting: langsung saja tulis 5 contoh kalimatnya, jangan tambahkan nomor, cukup pisahkan setiap kalimat dengan tanda koma, jangan tambahkan keterangan apapun di awal serta arti kalimat"
                    ]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 1,
            "topK" => 40,
            "topP" => 0.95,
            "maxOutputTokens" => 8192,
            "responseMimeType" => "text/plain"
        ]
    ];

    // Konversi data ke JSON
    $jsonData = json_encode($data);

    // Buat request ke API menggunakan cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    // Eksekusi request dan simpan respons
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode JSON menjadi array
    $data = json_decode($response, true);

    // Ambil teks
    $text = $data["candidates"][0]["content"]["parts"][0]["text"];
    $_SESSION['text'] = $text;

    // Redirect  ke index.php
    header("Location: index.php");
    exit();
}