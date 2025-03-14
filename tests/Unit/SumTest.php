<?php

function sum(float $a, float $b): float
{
    return $a + $b;
}

it("Performs Sum of a and b", function () {
    $result = sum(1, 2);

    expect($result)->toBe(3.0);
});


describe("Sum", function () {
    it("may sum integer", function () {
        $result = sum(1, 2);
        expect($result)->toBe(3.0);
    });

    it("may sum floating point number", function () {
        $result = sum(1.5, 2.5);
        expect($result)->toBe(4.0);
    });
});