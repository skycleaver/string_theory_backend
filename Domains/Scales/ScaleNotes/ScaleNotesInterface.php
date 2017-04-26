<?php
/**
 * Created by PhpStorm.
 * User: ttb
 * Date: 26/04/17
 * Time: 12:09
 */

namespace Scales\ScaleNotes;

use Notes\Note;

interface ScaleNotesInterface
{
    /**
     * @return Note
     */
    public function rootNote(): Note;

    /**
     * @return Note
     */
    public function secondNote(): Note;

    /**
     * @return Note
     */
    public function thirdNote(): Note;

    /**
     * @return Note
     */
    public function fourthNote(): Note;

    /**
     * @return Note
     */
    public function fifthNote(): Note;

    /**
     * @return Note
     */
    public function sixthNote(): Note;

    /**
     * @return Note
     */
    public function seventhNote(): Note;
}