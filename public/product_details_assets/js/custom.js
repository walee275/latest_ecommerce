// Search Section

const searchForm = document.getElementsByName('search-input');
const productsGrid1 = document.getElementById('products-grid-1');
const productsGrid2 = document.getElementById('products-grid-2');

// searchForm.addEventListener('submit', function(e){
//     e.preventDefault();
//     // alert('hi');
//     const searchElement = document.getElementById('search-input');
//     const keyWord = searchElement.value;

//     if(keyWord == ''){
//         productsGrid1.classList.remove('d-none');
//         productsGrid2.classList.add('d-none');
//     }else{
//         const data = {
//             _token:token,
//             keyword: keyWord,
//         }

//         fetch('/search/products', {
//             method : 'POST',
//             body : JSON.stringify(data),
//             headers : {
//                 'Content-Type': 'application/json',
//             },
//         }).then(function(response){
//             return response.json();
//         }).then(function(result){
//             console.log(result);
//             if(result){
//                 productsGrid1.classList.add('d-none');
//                 productsGrid2.classList.remove('d-none');
//                 productsGrid2.innerHTML = result;
//             }
//         })
//     }
// });
// console.log(searchForm)
searchForm.forEach(function(search) {
    // console.log(search);
    search.addEventListener('input', function(e) {
        e.preventDefault();
        // alert('hi')
        // const searchElement = document.getElementById('search-input');
        const keyWord = search.value;
        if(!keyWord){
            productsGrid1.classList.remove('d-none');
            productsGrid2.classList.add('d-none');
        }else{
            const data = {
                _token:token,
                keyword: keyWord,
            }

            fetch('/search/products', {
                method : 'POST',
                body : JSON.stringify(data),
                headers : {
                    'Content-Type': 'application/json',
                },
            }).then(function(response){
                return response.json();
            }).then(function(result){
                console.log(result);
                if(result){
                    productsGrid1.classList.add('d-none');
                    productsGrid2.classList.remove('d-none');
                    productsGrid2.innerHTML = result;
                }
            })
        }
    })
})









// // Get the dropdown toggle and menu
// const dropdownToggle = document.querySelector('.dropdwn-toggle');
// const dropdownMenu = document.querySelector('.dropdown-menu');

// // Add a click event listener to the toggle
// dropdownToggle.addEventListener('click', () => {
//   // Toggle the "show" class on the menu
//   dropdownMenu.classList.toggle('show');
// });

// // Close the menu when the user clicks outside of it
// window.addEventListener('click', (event) => {
//   if (!event.target.matches('.dropdwn-toggle')) {
//     dropdownMenu.classList.remove('show');
//   }
// });





// Quick View Section
