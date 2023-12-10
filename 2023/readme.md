# My coded solutions of the differents daily challenge Adventcode 2023
## DAY 1
### PART 1
- For this day 1 the solution is 56049  
- My idea is to use a function that turn a string into an array then I go though the array and when it finds the first numeric  - - - caracter  
it breaks the loop.  
- After that I create a new array that is the reverse array of the first one and I do the same thing.
- With two numbers I have the two values I need to combine then and return that number.  
- Finally, I add all that numbers.
### PART 2
I use two array-associative structures, the first one to turn the word into a number such as "one" => "1",...  
the second one to store the position that the number or the word is in the String (if is a word such as "one", "two". I store the position of the first character).  
I use a map where the key is the number and the value is an array that store the position of the numbers in the word.  
And then I just compare the positions to get the minimun position and the maximun position and I obtain the two numbers then I  
obtain the final number.  
The solution is 54530.

