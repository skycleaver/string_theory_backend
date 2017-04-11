<?php

class GetChordGuitarTest extends MyTestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $data
     */
    public function testGetChord(array $data)
    {
        $this->json(
            'GET',
            '/chord_guitar',
            [
                'chord_root' => $data['parameters']['chord_root'],
                'chord_type' => $data['parameters']['chord_type'],
                'chord_seventh' => $data['parameters']['chord_seventh'],
            ]
        )->seeJsonEqualsExactly(
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
                        'chord_guitar' => array_reverse(
                            [
                                ["e", "-", "-", "g", "-", "-", "-", "-", "C", "-", "-", "-"],
                                ["X", "C", "-", "-", "-", "e", "-", "-", "g", "-", "-", "-"],
                                ["g", "-", "-", "-", "-", "C", "-", "-", "-", "e", "-", "-"],
                                ["X", "-", "e", "-", "-", "g", "-", "-", "-", "-", "C", "-"],
                                ["X", "-", "-", "C", "-", "-", "-", "e", "-", "-", "g", "-"],
                                ["e", "-", "-", "g", "-", "-", "-", "-", "C", "-", "-", "-"]
                            ]
                        ),
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
                        'chord_guitar' => array_reverse(
                            [
                                ["X", "f", "-", "-", "-", "a", "-", "-", "-", "-", "D", "-"],
                                ["X", "-", "-", "D", "-", "-", "f", "-", "-", "-", "a", "-"],
                                ["X", "-", "a", "-", "-", "-", "-", "D", "-", "-", "f", "-"],
                                ["D", "-", "-", "f", "-", "-", "-", "a", "-", "-", "-", "-"],
                                ["a", "-", "-", "-", "-", "D", "-", "-", "f", "-", "-", "-"],
                                ["X", "f", "-", "-", "-", "a", "-", "-", "-", "-", "D", "-"],
                            ]
                        ),
                        'chord_root' => 'd',
                        'chord_type' => 'minor',
                        'chord_seventh' => '',
                    ]
                ]
            ],
        ];
    }
}