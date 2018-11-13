## P3 Peer Review

+ Reviewer's name: Juan Ignacio Andrade
+ Reviwee's name:  Pat Ausman
+ URL to Reviewe's P3 Github Repo URL: *<https://github.com/pausman/p3dwa>*


## 1. Interface
Address as many of the following points as applicable:

+ Very clean Easy to use interface, has a very neat layout.
+ It is overall very easy to use, a back button on each of the cypher encode pages may make navigation a bit simpler



## 2. Functional testing
One challenge of developing software is thinking of all the unexpected ways users might interact with our applications. It's easy to develop &ldquo;blinders&rdquo; to methods of interaction because we know so much about *how* our application works, and so we have a hard time imagining how our interfaces might be misinterpreted. Thus, it can be useful to have an outsider rigorously test our applications with the explicit intention of trying to break it.

Knowing this, it's time to put your reviewee's application to the test. Think of all the unexpected ways their application could be used with the intention of trying to produce some unexpected/undesirable outcome.

Examples...
+ tied to leave forms blank 
    + error mesage displayed
 
+ tried to access non existant page
    + 404 redirect
+ tested for elegal data
    + negative number: passed
    + large numbers: passed
    + extremely long string (50 paragraph long lorem ipsum): error Request-URI Too Long
    + emoji in text field: returns blank stings or the same emojis back depending on the encoder

## 3. Code: Routes
routes correctly done

## 4. Code: Views

+ Template inheritance correctly used
+ no separation of concern issues
