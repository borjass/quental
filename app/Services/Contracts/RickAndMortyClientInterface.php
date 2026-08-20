<?php

namespace App\Services\Contracts;

interface RickAndMortyClientInterface
{
    public function getLocations(int $page = 1, array $filters = []);

    public function getLocation(int $id);

    public function getEpisodes(int $page = 1, array $filters = []);

    public function getEpisode(int $id);

    public function getCharacters(int $page = 1, array $filters = []);

    public function getCharacter(int $id);
}
