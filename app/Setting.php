<?php


namespace App;


class Setting
{

    protected $allowd = ['city','site','github','bio'];
    protected $user;

    /**
     * Setting constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function merge(array $attributes)
    {
        $settings = array_merge($this->user->setting,array_only($attributes,$this->allowd));
        return $this->user->update(['setting'=>$settings]);
    }
}