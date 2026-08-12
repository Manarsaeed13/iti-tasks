
// task1
function findSecondLowestAndGreatest(arr) {
  let lowest = Infinity;
  let secondLowest = Infinity;
  let greatest = -Infinity;
  let secondGreatest = -Infinity;

  for (let i = 0; i < arr.length; i++) {
    let num = arr[i];

    if (num < lowest) {
      secondLowest = lowest;
      lowest = num;
    } else if (num < secondLowest && num !== lowest) {
      secondLowest = num;
    }

    
    if (num > greatest) {
      secondGreatest = greatest;
      greatest = num;
    } else if (num > secondGreatest && num !== greatest) {
      secondGreatest = num;
    }
  }

  return `${secondLowest},${secondGreatest}`;
}

console.log(findSecondLowestAndGreatest([1, 2, 3, 4, 5, 1, 5])); // 2,4





// task2
function capitalizeFirstLetters(str) {
  return str
    .split(" ")
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(" ");
}

console.log(capitalizeFirstLetters("the quick brown fox")); // The Quick Brown Fox




// task3
function printKeyValuePairs(obj) {

    for (let key in obj) {

        if (typeof obj[key] === "object") {

            for (let childKey in obj[key]) {
                console.log(
                    `${key}.${childKey}: ${obj[key][childKey]}`
                );
            }

        } else {
            console.log(`${key}: ${obj[key]}`);
        }
    }
}

printKeyValuePairs(student);



// task4
const library = {
  books: [
    { title: "Book One", author: "Author A", year: 2001 },
    { title: "Book Two", author: "Author B", year: 2010 },
    { title: "Book Three", author: "Author C", year: 2020 }
  ]
};

function logBookTitles(lib) {
  lib.books.forEach(book => console.log(book.title));
}

logBookTitles(library);


// task5
function applyOperation(a, b, operation) {
  return operation(a, b);
}

const add = (a, b) => a + b;
const multiply = (a, b) => a * b;

console.log(applyOperation(5, 3, add));               // 8
console.log(applyOperation(5, 3, multiply));           // 15
console.log(applyOperation(10, 2, (a, b) => a - b));   // 8
console.log(applyOperation(10, 2, (a, b) => a / b));   // 5


// task6
function processArray(arr, callback) {
  const result = arr.map(callback);
  console.log(result.join(", "));
}

const square = n => n * n;
var numbers = [1, 2, 3, 4, 5];
processArray(numbers, square); // 1, 4, 9, 16, 25