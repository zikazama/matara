<?php

function serpapi($query)
{
    $client = new GoogleSearch("7fda120f578b38ebc55bf2e1fa302390f367a1e9ebfe1423bbfa6dff9e85b53e");
    $query = ["q" => $query];
    $response = $client->get_json($query);
    return $response;
}
