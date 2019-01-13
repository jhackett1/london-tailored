// Scroll back to top on click
document.querySelector('.back-to-top').addEventListener('click', function(e){
  e.preventDefault();
  document.querySelector('body').scrollIntoView({
    block: "start",
    inline: "nearest",
    behavior: 'smooth'
  });
});
