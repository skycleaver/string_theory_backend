<?php

class GetChordsByScaleTest extends MyTestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $data
     */
    public function testGetChordsByScale(array $data)
    {
        $this->json(
            'GET',
            '/chords_by_scale',
            [
                'scale_root' => $data['parameters']['scale_root'],
                'scale_name' => $data['parameters']['scale_type'],
            ]
        )->assertClosure(
            function (array $actual, array $expected) {
                foreach ($expected['chords'] as $expectedChord) {
                    $found = false;
                    foreach ($actual['chords'] as $actualChord) {
                        asort($actualChord);
                        asort($expectedChord);

                        if (json_encode($actualChord) === json_encode($expectedChord)) {
                            $found = true;
                        }
                    }
                    if (!$found) {
                        return false;
                    }
                }
                return true;
            },
            $data['result']
        );
    }

    public function dataProvider(): array
    {
        return [
            [
                'c major' => [
                    'parameters' => [
                        'scale_root' => 'c',
                        'scale_type' => 'major',
                    ],
                    'result' => [
                        'chords' => [
                            [
                                'chord' => 'c e g',
                                'chord_root' => 'c',
                                'chord_type' => 'major',
                            ],
                            [
                                'chord' => 'd f a',
                                'chord_root' => 'd',
                                'chord_type' => 'minor',
                            ],
                            [
                                'chord' => 'e a b',
                                'chord_root' => 'e',
                                'chord_type' => 'sus4',
                            ],
                            [
                                'chord' => 'f g c',
                                'chord_root' => 'f',
                                'chord_type' => 'sus2',
                            ],
                            [
                                'chord' => 'g b d',
                                'chord_root' => 'g',
                                'chord_type' => 'major',
                            ],
                            [
                                'chord' => 'a c e',
                                'chord_root' => 'a',
                                'chord_type' => 'minor',
                            ],
                            [
                                'chord' => 'b d f',
                                'chord_root' => 'b',
                                'chord_type' => 'diminished',
                            ]
                        ]
                    ]
                ]
            ],
        ];
    }
}