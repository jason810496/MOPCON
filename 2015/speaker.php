<?php
include __DIR__ . '/src/init.php';

$params = [
    'pageid' => 'speaker',
    'speakers' => [],
];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $params['speakers'] = [
        $id => getSpeakerById($id)
    ];
    $params['og_image'] = 'speaker/' . $params['speakers'][$id]['pic'];
    $params['og_url'] = 'speaker.php?' . $id;
    $params['ogdesc'] = $params['speakers'][$id]['name'] . "\n" . $params['speakers'][$id]['title'] . "\n" . $params['speakers'][$id]['bio'];
} else {
    $params['speakers'] = getAllSpeakers();
}

if (count($params['speakers']) === 0 || current($params['speakers']) === null) {
    header('Location: /2015/speaker.php');
    exit;
}

render('speaker.twig', $params);
