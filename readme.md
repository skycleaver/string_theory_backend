# String Theory

String Theory aims to be an open-source tool that helps amateur musicians perform and compose pieces of music.


Its goal is to automate time consuming and/or boring tasks like figuring out the chords of a scale or all the possible
fingerings of an A minor to make playing and making music as enjoyable and creative as possible.

## So how does it work?

String Theory itself is an API: the end user will need a client application to use it.
This application can be whatever, from a mobile app to a web page: I've included a crude example
[here](https://github.com/skycleaver/string_theory_frontend).
Its role is to perform the calls to the API and format the information for the user.

Let's see an example.

Our example application wants to display the fingering of a D minor in the guitar.

It performs a GET call to the `/chord_guitar` endpoint:


![Example 1](http://imgur.com/g2uHACi.png)

A closer look to the parameters it sends:


![Example 2](http://imgur.com/nXt4bXY.png)

The response from the API:


![Example 3](http://imgur.com/oa1ysAh.png)

The response formatted for clarity:


![Example 4](http://imgur.com/otogHqE.png)

The example application formatting the response into something actually useful!


![Example 5](http://imgur.com/GzHk7Aa.png)
