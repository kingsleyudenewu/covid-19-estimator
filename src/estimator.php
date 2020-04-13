<?php

function covid19ImpactEstimator($data)
{
    if (!is_array($data) || empty($data)) {
        return false;
    }

    $estimatorData = [];
    $estimatorData['data'] = $data;
    $estimatorData['impact'] = [
        'currentlyInfected' => (int)$data['reportedCases'] * 10,
        'infectionsByRequestedTime' => (int) (($data['reportedCases'] * 10) * 512),
        'severeCasesByRequestedTime' => (int) ((($data['reportedCases'] * 10) * 512) * 0.15),
        'hospitalBedsByRequestedTime' => (int) ($data['totalHospitalBeds'] -  ((($data['reportedCases'] * 10) * 512) * 0.15)),
        'casesForICUByRequestedTime' => (int) ((($data['reportedCases'] * 10) * 512) * 0.15),
        'casesForVentilatorsByRequestedTime' => (int) ((($data['reportedCases'] * 10) * 512) * 0.02),
        'dollarsInFlight' => (int) (((($data['reportedCases'] * 10) * 512) * 0.65 * 1.5) / 30)
    ];
    $estimatorData['severeImpact'] = [
        'currentlyInfected' => (int)$data['reportedCases'] * 50,
        'infectionsByRequestedTime' => (int) (($data['reportedCases'] * 50) * 512),
        'severeCasesByRequestedTime' => (int) ((($data['reportedCases'] * 50) * 512) * 0.15),
        'hospitalBedsByRequestedTime' => (int) ($data['totalHospitalBeds'] - ((($data['reportedCases'] * 50) * 512) * 0.15)),
        'casesForICUByRequestedTime' => (int) ((($data['reportedCases'] * 50) * 512) * 0.05),
        'casesForVentilatorsByRequestedTime' => (int) ((($data['reportedCases'] * 50) * 512) * 0.02),
        'dollarsInFlight' => (int) (((($data['reportedCases'] * 50) * 512) * 0.65 * 1.5) / 30)
    ];

    return $estimatorData;
}