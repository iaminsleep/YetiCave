const deleteBetBtn = document.querySelector('.history__delete');
if(deleteBetBtn) 
  deleteBetBtn.addEventListener('click', function(e) {
    if(!confirm('Вы уверены, что хотите удалить эту ставку?')) {
      e.preventDefault();
    }
  });

const endAuctionBtn = document.querySelector('.end-auction-btn');
if(endAuctionBtn) 
  endAuctionBtn.addEventListener('click', function(e) {
    if(!confirm('Вы уверены, что хотите завершить аукцион? Если ставки присутствуют, то человек, сделавший последнюю ставку, будет выбран как победитель.')) {
      e.preventDefault();
    }
  });