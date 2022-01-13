<?php

namespace PasswordGenerator;

class PasswordGenerator
{
    /**
     * @param  string  $string
     * @param  int  $length
     *
     * @return bool
     */
    public function strengthOne(string $string, int $length = 6): bool
    {
        return (bool) preg_match('/(?=.{'.$length.',}$)(?=.*[a-z])(?=.[A-Z]{2})/', $string);
    }

    /**
     * @param  string  $string
     * @param  int  $length
     *
     * @return bool
     */
    public function strengthTwo(string $string, int $length = 6): bool
    {
        return (bool) preg_match('/(?=.{'.$length.',}$)(?=.*[a-z])(?=.[A-Z]{2})(?=.*[2-5])/', $string);
    }


    /**
     * @param  string  $string
     * @param  int  $length
     *
     * @return bool
     */
    public function strengthThree(string $string, int $length = 6): bool
    {
        return (bool) preg_match('/(?=.{'.$length.',}$)(?=.[A-Za-z])(?=.*\W)/', $string);
    }
}
