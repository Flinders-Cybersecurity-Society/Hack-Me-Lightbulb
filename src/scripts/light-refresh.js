var element = document.getElementById('update-version');
current_id = (element.textContent.trim());
console.log("I am " . current_id);




// function localfetch(){
// fetch('http://localhost/o-week/src/api/board-refresh.php')
//     .then(res => res.json())
//     .then((out) => {
//         return out;
// }).catch(err => console.error(err));
// }

// console.log(localfetch());


async function foo() {
    let obj;
  
    const res = await fetch('http://localhost/o-week/src/api/light-query.php')
  
    obj = await res.json();
  
    Number(obj);
    if (obj > current_id) {
        console.log("New version available");
        location.reload(); 
    } else {
        console.log("No new version available");
    }
  }


  const interval = setInterval(function() {
    foo();

  }, 300);
 




