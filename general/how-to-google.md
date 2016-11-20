---
title: "How to use Google Operators?"
updated: "November 20, 2016"
permalink: "/faq/how-to-use-google-operators/"
---

# How do I use Google for what I need to know?
Google can give you an answer to your problem really fast. Learning how to Google can change a lot in your every day life and how fast you can find an information you want to know. For example how you can exclude keywords or how you can put emphasis on a specific keyword or even matching text.
Often using Google to search for an Error Message or a specific PHP Function is quick and gives you an appropriate Answer on the first Results Page.

# Table of Content
- Exclude/Emphasise/Wildcard Keywords
- Matching Text
- Data from specific Websites or TLDs
- Search for a Word's definition
- Searching for multiple things at the same time
- Searching for specific FileTypes
- Filter for a specific Timeframe 
- Get a Websites Cached Version
- See who links to a Website

## Exclude and emphasise Keywords or use a wildcard
While searching for something there is a probability, that a special keyword might be connected to it, that you don't want to be included in your search.
To exlude a Keyword, simply use a "-" sign before the Keyword. For example:
```
mySearchKeyword -aKeywordIdontWant
```
To emphasise a Keyword, simply use a "+" sign before the Keyword. For example:
```
mySearchKeyword +anEmphasisedKeyword
```
If you do not know a fitting word, Google can take a wildcard using an "*" and Google will give you the best suitable result.
```
How to learn *
```

## Matching Text
To search for matching Text in the description, surround the Text in "". For example:
```
"My matching Text"
```
To search for matching Text in the title, use the following example:
```
My Search intitle:KeywordInTitle
```
To match parts of the URL, you can use the following:
```
How to learn PHP inurl:tutorial
```

## Get data from a specific Website or Top Level Domain
If you want to have the result from a special Website, Google can help you too with that. Simply use "site:"
Like with Keywords, you can exclude a certain Website too. This works for TLD's (Top Level Domains) too. Have a look at these examples:
```
How to learn PHP site:wwphp-fb.github.io
How to learn PHP -site:wwphp-fb.github.io
How to learn PHP site:edu
```

## Get the definition of a word
Sometimes you might encounter a word you do not known or you don't know what it means exactly? Don't worry, Google has something for that too. Simply use define, meaning, synonym or definition like this:
```
define robot
robot definition
robot meaning
robot synonym
```
Please note: If you use synonym, don't use the "+" Operator, as it removes synonyms of this Keyword.

## Search for two things at the same time
Like in programming with using IF Statements looking for some value or another, we can use OR in a Google Query to get one or another like:
```
Query1 OR Query2
```
And you've guessed it. If there's "OR" there must be "AND" too. Just use it like this:
```
Query1 AND Query2
```

## Looking for specific file types
Sometime you want some special file types, for example a pdf document. For that Google can Query based on File Types.
```
filetype:pdf Query
```
You can find a FileType list [here](https://en.wikipedia.org/wiki/List_of_file_formats).

## Get Content from a specific time
If you want newly released material for example a PHP Tutorial how to make a Login rather then a Tutorial from years ago, you can select a specific release time by clicking the dropdown where it normally says "Any time". You will get a dropdown where you can set the time you want.

## What can I do if a Website is not reachable?
Google often has a Cached version of a Website. To get that version, use:
```
Cache: wwphp-fb.github.io
```

## How to find out who Links to my site?
Google can show you who links to your site, which can help with your SEO (even though Webmaster Tools is recommended for that).
```
link:wwphp-fb.github.io
```


