<?php


$books = [
    [
        'title' => 'Du gaideliai',
        'pages' => 14,
    ],
    [
        'title' => 'Haris poteris',
        'pages' => 3000,
    ],
    [
        'title' => 'Testas',
        'pages' => 3,
    ]
];
echo booksXml($books);


function booksXml(array $books)
{
    $doc = new DOMDocument();
    $doc->formatOutput = true;
    $root = $doc->createElement('knygos');

    foreach ($books as $booksInfo) {
        $knyga = $doc->createElement('knyga');
        $knyga->appendChild($doc->createElement('pavadinimas', $booksInfo['title']));
        $knyga->appendChild($doc->createElement('puslapiai', $booksInfo['pages']));

        $root->appendChild($knyga);
    }
    $doc->appendChild($root);
    return $doc->saveXML();
}