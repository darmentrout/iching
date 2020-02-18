
# I Ching API

## Background
The *I Ching*, usually translated as *Book of Changes*, is an ancient Chinese divination text and the oldest of the Chinese classics. With more than two and a half millennia's worth of commentary and interpretation, the *I Ching* is an influential text read throughout the world, providing inspiration to the worlds of religion, philosophy, literature, and art. ([Read More at Wikipedia](https://en.wikipedia.org/wiki/I_Ching))

Source Content: [http://www.cfcl.com/ching/](http://www.cfcl.com/ching/)

## Usage

Request a Random Hexagram:
 `iching.php?random`

Request a Specific Hexagram:
 `iching.php?id=64`

All endpoints return JSON. Example output:
```
[{
    "id": "50",
    "name": "Ting - The Cauldron",
    "hexagram": "\u2632\u2634",
    "judgement": "The Cauldron. Supreme good fortune. Success.",
    "image": "Fire over wood: the image of the cauldron. Thus the superior person consolidates their fate by making their position correct."
}]
```

Errors are returned as JSON, too.
```
[{
    "error": "valid IDs fall within 1-64 range"
}]
```
