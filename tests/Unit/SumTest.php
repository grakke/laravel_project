<?php

function sum(int|float $int, int|float $int1)
{
    return $int + $int1;
}

test('sum', function () {
    $result = sum(1, 2);

    $this->assertSame(3, $result); // Same as expect($result)->toBe(3)
});

it('performs sums', function () {
    $result = sum(1, 3);

    expect($result)->toBe(4);
});

describe('sum', function () {
    it('may sum integers', function () {
        $result = sum(1, 2);

        expect($result)->toBe(3);
    });

    it('may sum floats', function () {
        $result = sum(1.5, 2.5);

        expect($result)->toBeFloat()->not->toBeString()->toBe(4.0);
    });
});

describe('exceptions', function () {
    expect(1.5)->toBeBetween(1, 2);

    $expectationDate = new DateTime('2023-09-22');
    $oldestDate = new DateTime('2023-09-21');
    $latestDate = new DateTime('2023-09-23');

    expect($expectationDate)->toBeBetween($oldestDate, $latestDate);

    expect('')->toBeEmpty();
    expect([])->toBeEmpty();
    expect(null)->toBeEmpty();

    expect(0)->toBeFalsy();
    expect('')->toBeFalsy();

    expect(23)->toBeGreaterThanOrEqual(21);
});
