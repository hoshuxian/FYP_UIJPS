@extends ('masterE')
@section('content')


<!DOCTYPE html>
    <html>
        <style>
table {
    margin-left: 15%;
    width:75%;
    border-collapse:collapse;
    font-family:Arial;
    padding-bottom:20px;
    margin-top: 12px;
}

table th,td{
  border: 2px solid #094b65;
  height:25px;
  text-align:center;
}

.search2 {
    margin-left:30px;
}

.employer:hover{
    background-color: #094b65;
  color: white;
}

.searchbtn{
    width:9%;
    height:30px;
    font-size:18px;
    background-color:#0fc70f;
    border: transparent;
    border-radius: 10px;
    margin-right: 10px;
}

.refreshbtn{
    width:9%;
    height:30px;
    font-size:18px;
    background-color:#f44336;
    border: transparent;
    border-radius: 10px;
}

.input-group{
    margin-left:20%;
}

.items-controller{
	flex-shrink: 0;
	display: flex;
	align-content: center;
	align-items: center;
    margin-left: 15%;
    margin-bottom: 3%;

}
		select{
		 	padding: 2px;
	    	margin: 0 10px;
	   		outline: none;
	    	cursor: pointer;
	    	border: none;
	    	background: transparent;
		}
		.search > input{
			padding: 8px;
		    border: none;
		    outline: navajowhite;
		    margin: 0 0 0 20px;
		    background: white;
		}
		.field{
			width: 90%;
			height: auto;
			margin: auto;
		}
		
		.bottom-field{
			width: 100%;
			padding: 20px;
			margin-top: 20px;
		}
		.pagination{
	      display: flex;
	      justify-content: center;
	      align-items: center;
	    }
	    .pagination li{
	      list-style: none;
	      padding: 2px;
	      margin: 10px;
	      flex-shrink: 0;
	      text-align: center;
	      border-radius: 5px;
	      border: 1px solid #999;
	      color: #999;
	    }
	    .pagination li.active{
	      background: #0fc70f;
	      color: white;
	      border-color: #0fc70f;

	    }
	    .pagination li a{
	      text-decoration: none;
	      padding: 3px 8px;
	      color: inherit;
	      display: block;
	      font-family: sans-serif;
	      font-size: 13px;
	    }

		.mt-1 input:hover {
    background-color: #094b65;
  color: white;
}

.mt-1 input{
    width:150px;
  margin-left:70%;
  border-radius:8px;
  background-color: white; 
  color: black; 
  border: 2px solid #094b65;
  height: 20%
}

.input-group input{
    width:60%;
    height:4%;
    font-size:18px;
    padding-left:20px;
}

.alert-success{
    width: 65%;
    height: 30px;
    margin-left: 20%;
    background-color: #d4edda;
    border-radius: 5px;
    margin-top: 5px;
    padding-left: 10px;
    color: #007e33;
}

.alert-danger{
    width: 65%;
    height: 30px;
    margin-left: 20%;
    background-color: #f8d7da;
    border-radius: 5px;
    margin-top: 5px;
    padding-left: 10px;
    color: #cc0000;
}

.deco{
    z-index:-1;
    object-fit: cover;
    position: absolute;
    width:18%;
    height:12%;
    margin-left: 38%;
    margin-top: -5%;
    transform: rotate(-10deg);
}

</style>
<h1 style="text-align:center;">Hired List</h1>
<img src="/deco1.png" class="deco" id="deco"> 
<div class="items-controller">
                <h4>Show</h4>
                <select name="" id="itemperpage">
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="08">08</option>
                    <option value="10" selected>10</option>
                    <option value="15">15</option>
                </select>
                <h4>Per Page</h4>
            </div>
</form>
<div class = "table">
<br>
<table>
  <thead>
<tr>
	<th>Student's ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Phone Number</th>
    <th>Action</th>
  </tr>
</thead>
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
@foreach($deta as $detaa)
<form action='/displaypost/{{ $detaa->post_id}}' method='get'enctype="multipart/form-data">
@csrf
<tbody>
  <tr>
  <td>{{$detaa->std_matric}}</td>
	<td >{{$detaa->std_name}}</td>
    <td>{{$detaa->std_email}}</td>
    <td >{{$detaa->std_phonenum}}</td>
    <td><a href="/offerprofile/{{$detaa->post_id}}/{{ $detaa->id}}"><button type="button" style="background-color: white; border: 1px solid white;" > <ion-icon name="eye-outline"></ion-icon></button></a>&emsp;<a href="/displayhiredlist/{{ $detaa->post_id}}/{{ $detaa->id}}/delete"><button type="button" style="background-color: white; border: 1px solid white;" onclick="return confirm('Are you sure?This record and it`s details will be permanantly deleted!')"><ion-icon name="trash-outline"></ion-icon></button></a></td>
  
</tr>
</tbody>
@endforeach
      </table>
      <section class="field">
            <div class="bottom-field">
                <ul class="pagination">
                  <li class="prev"><a href="#" id="prev">&#139;</a></li>
                    <!-- page number here -->
                  <li class="next"><a href="#" id="next">&#155;</a></li>
                </ul>
            </div>
        </section>
		<br><br>
<button type="submit" class="button" value="back" style="margin-left:80%;height: 45px;margin-top: 15px;margin-bottom: 15px;width: 120px;background: white;border: 3px solid #F3C301;font-size: 18px;font-weight: 500;border-radius: 35px;letter-spacing: 1px;"> BACK</button>
</form>
</div>

<script>
    var tbody = document.querySelector("tbody");
		var pageUl = document.querySelector(".pagination");
		var itemShow = document.querySelector("#itemperpage");
		var tr = tbody.querySelectorAll("tr");
		var emptyBox = [];
		var index = 1;
		var itemPerPage = 8;

		for(let i=0; i<tr.length; i++){ emptyBox.push(tr[i]);}

		itemShow.onchange = giveTrPerPage;
		function giveTrPerPage(){
			itemPerPage = Number(this.value);
			// console.log(itemPerPage);
			displayPage(itemPerPage);
			pageGenerator(itemPerPage);
			getpagElement(itemPerPage);
		}

		function displayPage(limit){
			tbody.innerHTML = '';
			for(let i=0; i<limit; i++){
				tbody.appendChild(emptyBox[i]);
			}
			const  pageNum = pageUl.querySelectorAll('.list');
			pageNum.forEach(n => n.remove());
		}
		displayPage(itemPerPage);

		function pageGenerator(getem){
			const num_of_tr = emptyBox.length;
			if(num_of_tr <= getem){
				pageUl.style.display = 'none';
			}else{
				pageUl.style.display = 'flex';
				const num_Of_Page = Math.ceil(num_of_tr/getem);
				for(i=1; i<=num_Of_Page; i++){
					const li = document.createElement('li'); li.className = 'list';
					const a =document.createElement('a'); a.href = '#'; a.innerText = i;
					a.setAttribute('data-page', i);
					li.appendChild(a);
					pageUl.insertBefore(li,pageUl.querySelector('.next'));
				}
			}
		}
		pageGenerator(itemPerPage);
		let pageLink = pageUl.querySelectorAll("a");
		let lastPage =  pageLink.length - 2;
		
		function pageRunner(page, items, lastPage, active){
			for(button of page){
				button.onclick = e=>{
					const page_num = e.target.getAttribute('data-page');
					const page_mover = e.target.getAttribute('id');
					if(page_num != null){
						index = page_num;

					}else{
						if(page_mover === "next"){
							index++;
							if(index >= lastPage){
								index = lastPage;
							}
						}else{
							index--;
							if(index <= 1){
								index = 1;
							}
						}
					}
					pageMaker(index, items, active);
				}
			}

		}
		var pageLi = pageUl.querySelectorAll('.list'); pageLi[0].classList.add("active");
		pageRunner(pageLink, itemPerPage, lastPage, pageLi);

		function getpagElement(val){
			let pagelink = pageUl.querySelectorAll("a");
			let lastpage =  pagelink.length - 2;
			let pageli = pageUl.querySelectorAll('.list');
			pageli[0].classList.add("active");
			pageRunner(pagelink, val, lastpage, pageli);
			
		}
	
		
		
		function pageMaker(index, item_per_page, activePage){
			const start = item_per_page * index;
			const end  = start + item_per_page;
			const current_page =  emptyBox.slice((start - item_per_page), (end-item_per_page));
			tbody.innerHTML = "";
			for(let j=0; j<current_page.length; j++){
				let item = current_page[j];					
				tbody.appendChild(item);
			}
			Array.from(activePage).forEach((e)=>{e.classList.remove("active");});
     		activePage[index-1].classList.add("active");
		}
        </script>
</html>

@endsection