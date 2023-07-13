
<?php

function distributeCards($numPeople) {
    if (!is_numeric($numPeople) || $numPeople < 0) {
        echo "Input value does not exist or value is invalid";
        return;
    }
    
    $cards = array();
    $suits = array('S', 'H', 'D', 'C');
    $ranks = array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K');
    
    // Create the deck of cards
    foreach ($suits as $suit) {
        foreach ($ranks as $rank) {
            $cards[] = $suit . '-' . $rank;
        }
    }
    
    // Shuffle the deck
    shuffle($cards);
    
    // Distribute the cards to the people
    $numCardsPerPerson = count($cards) / $numPeople;
    $people = array_chunk($cards, $numCardsPerPerson);
    
    // Display the distributed cards
    foreach ($people as $index => $personCards) {
        $cardsString = implode(',', $personCards);
        echo "Person " . ($index + 1) . ": " . $cardsString . "<br>";
    }
}

// Usage example:
$numPeople = 3;
distributeCards($numPeople);
?>
