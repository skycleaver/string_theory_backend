<?php

class MyTestCase extends TestCase
{
    /**
     * This function does what seeJsonEquals does, but it does not order the arrays inside the JSON.
     * In our case it's important that isn't reordered because an 'e' on the 2nd fret is not the
     * same as an 'e' on the 3rd fret.
     *
     * @param array $data
     * @return $this
     */
    public function seeJsonEqualsExactly(array $data)
    {
        $actual = json_encode(
            json_decode($this->response->getContent(), true)
        );

        $this->assertEquals(json_encode($data), $actual);

        return $this;
    }

    public function assertClosure(Closure $function, array $data)
    {
        $result = $function(json_decode($this->response->getContent(), true), $data);
        $this->assertTrue($result);

        return $this;
    }
}