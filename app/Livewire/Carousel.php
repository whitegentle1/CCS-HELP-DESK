<?php

namespace App\Livewire;

use Livewire\Component;

class Carousel extends Component
{
    public $imagePath = 'assets/imgs/';
    public $images = [
        'slide1.jpg',
        'slide2.jpg',
        'slide3.jpg',
        'slide4.jpg',
        'slide5.jpg',
        'slide6.jpg',
        'slide7.jpg',
        'slide8.jpg',
        'slide9.jpg',

    ];

    public $currentIndex = 0;

    public function render()
    {
        return view('livewire.carousel');
    }

    public function next()
    {
        $this->currentIndex = ($this->currentIndex + 1) % count($this->images);
    }

    public function prev()
    {
        $this->currentIndex = ($this->currentIndex - 1 + count($this->images)) % count($this->images);
    }
}
