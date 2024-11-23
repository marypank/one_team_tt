<?php

const ROUNDS = 2;

$response = calculateRounds($_FILES['teamsFile'] ?? []);

echo $response;

function calculateRounds(array $file): string
{
    $response = [
        'data' => [],
        'error' => null,
    ];

    $data = getDataFromFile($file);
    if (!$data) {
        $response['error'] = 'Проблема в файле или при загрузке';
        
        return getEncodedResponse($response);
    }

    $teamCounts = count($data);
    if ($teamCounts % 2 !== 0 || $teamCounts === 0) {
        $response['error'] = 'Неверное количество команд';
        
        return getEncodedResponse($response);
    }

    $calendar = [];
    
    setHostFlagsToTeams($data);

    for ($r = 0; $r < ROUNDS; $r++) {
        // todo: вернуть shuffle($data);

        $homeTeam = $data;
        $fosterTeam = array_splice($homeTeam, $teamCounts/2);
        for ($i = 1; $i < $teamCounts; $i++) {
            for ($j = 0; $j < count($homeTeam); $j++) {
                if ($homeTeam[$j]['wasHost']) {
                    $homeTeam[$j]['wasHost'] = false;
                    // $fosterTeam[$j]['wasHost'] = true;

                    $calendar[$r][$i][$j]["home"] = $fosterTeam[$j]['title'];
                    $calendar[$r][$i][$j]["foster"] = $homeTeam[$j]['title'];
                } else {
                    $homeTeam[$j]['wasHost'] = true;
                    // $fosterTeam[$j]['wasHost'] = false;

                    $calendar[$r][$i][$j]["home"] = $homeTeam[$j]['title'];
                    $calendar[$r][$i][$j]["foster"] = $fosterTeam[$j]['title'];
                }
            }

            $lastFosterTeam = array_pop($fosterTeam);
            $firstHomeTeam = current(array_splice($homeTeam,1,1)); // "Первая" команда, исключая самую первую

            array_unshift($fosterTeam, $firstHomeTeam);
            array_push($homeTeam, $lastFosterTeam);
        }

    }
    $response['data'] = $calendar;

    return getEncodedResponse($response);
}

function getDataFromFile(array $file): array
{
    if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
        return [];
    }
    $data = file_get_contents($file['name']);
    $data = json_decode($data, true);
    $data = $data['teams'] ?? [];

    return $data;
}

function setHostFlagsToTeams(array &$data): void
{
    foreach ($data as &$team) {
        $team['wasHost'] = false;
    }
}

function getEncodedResponse(array $response): string
{
    return json_encode($response);
}
