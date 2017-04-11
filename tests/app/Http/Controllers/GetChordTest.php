<?php

class GetChordTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $data
     */
    public function testGetChord(array $data)
    {
        $this->json(
            'GET',
            '/chord',
            [
                'chord_root' => $data['parameters']['chord_root'],
                'chord_type' => $data['parameters']['chord_type'],
                'chord_seventh' => $data['parameters']['chord_seventh'],
            ]
        )->seeJsonEquals(
            $data['result']
        );
    }

    public function dataProvider(): array
    {
        return [
            [
                'c major' => [
                    'parameters' => [
                        'chord_root' => 'c',
                        'chord_type' => 'major',
                        'chord_seventh' => null,
                    ],
                    'result' => [
                        'chord' => 'c e g',
                        'chord_root' => 'c',
                        'chord_type' => 'major',
                        'chord_seventh' => '',
                    ]
                ]
            ],
            [
                'd minor' => [
                    'parameters' => [
                        'chord_root' => 'd',
                        'chord_type' => 'minor',
                        'chord_seventh' => null,
                    ],
                    'result' => [
                        'chord' => 'd f a',
                        'chord_root' => 'd',
                        'chord_type' => 'minor',
                        'chord_seventh' => '',
                    ]
                ]
            ],
            [
                'e major maj7' => [
                    'parameters' => [
                        'chord_root' => 'e',
                        'chord_type' => 'major',
                        'chord_seventh' => 'maj7',
                    ],
                    'result' => [
                        'chord' => 'e g# b d#',
                        'chord_root' => 'e',
                        'chord_type' => 'major',
                        'chord_seventh' => 'maj7',
                    ]
                ]
            ],
            [
                'f# minor min7' => [
                    'parameters' => [
                        'chord_root' => 'f#',
                        'chord_type' => 'minor',
                        'chord_seventh' => 'min7',
                    ],
                    'result' => [
                        'chord' => 'f# a c# e',
                        'chord_root' => 'f#',
                        'chord_type' => 'minor',
                        'chord_seventh' => 'min7',
                    ]
                ]
            ],
            [
                'g major min7' => [
                    'parameters' => [
                        'chord_root' => 'g',
                        'chord_type' => 'major',
                        'chord_seventh' => 'min7',
                    ],
                    'result' => [
                        'chord' => 'g b d f',
                        'chord_root' => 'g',
                        'chord_type' => 'major',
                        'chord_seventh' => 'min7',
                    ]
                ]
            ],
            [
                'a minor maj7' => [
                    'parameters' => [
                        'chord_root' => 'a',
                        'chord_type' => 'minor',
                        'chord_seventh' => 'maj7',
                    ],
                    'result' => [
                        'chord' => 'a c e g#',
                        'chord_root' => 'a',
                        'chord_type' => 'minor',
                        'chord_seventh' => 'maj7',
                    ]
                ]
            ],
            [
                'b diminished' => [
                    'parameters' => [
                        'chord_root' => 'b',
                        'chord_type' => 'diminished',
                        'chord_seventh' => null,
                    ],
                    'result' => [
                        'chord' => 'b d f',
                        'chord_root' => 'b',
                        'chord_type' => 'diminished',
                        'chord_seventh' => '',
                    ]
                ]
            ]
        ];
    }
}