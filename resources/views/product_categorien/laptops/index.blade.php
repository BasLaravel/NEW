@extends('master')

@section('content')
<div class="search-box">

    <form class="mb-5"  method="POST" action="/laptops/search/bybrand">
    @csrf
    <h6>Merk</h6>
     @foreach($merken as $merk)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="{{$merk['specsTag']}}" name="merken[]" value="{{$merk['specsTag']}}"
        onchange='this.form.submit()'>{{$merk['specsTag']}}
        <label class="form-check-label" for="{{$merk['specsTag']}}"></label>
    </div>
     @endforeach    
    </form>   


      <form class="mb-5"  method="POST" action="/laptops/search/byscreendiameter">
    @csrf
    <h6>Diameter</h6>
     @foreach($screendiameter as $screendiameter)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="{{$screendiameter->screen_diameter}}" name="screendiameter[]" 
        value="{{$screendiameter->screen_diameter}}" onchange='this.form.submit()'>{{$screendiameter->screen_diameter}}
        <label class="form-check-label" for="{{$screendiameter->screen_diameter}}"></label>
    </div>
     @endforeach    
    </form>   

        <form class="mb-5"  method="POST" action="/laptops/search/byprocessor">
    @csrf
    <h6>Processor</h6>
     @foreach($processor as $processor)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="{{$processor->processor}}" name="processor[]" 
        value="{{$processor->processor}}" onchange='this.form.submit()'>{{$processor->processor}}
        <label class="form-check-label" for="{{$processor->processor}}"></label>
    </div>
     @endforeach    
    </form>   



 </div>




<div class="container">
    @foreach($laptops as $laptop)
    <hr>
    <div class="row mt-5">
        <div class="col-4">
            <img class="card-img-top" src="{{$laptop->image_large}}"  alt="Product image cap">
        </div>
        <div class="col-8">
            <h5 class="card-title">{{$laptop->title}}</h5>
            <p class="card-text">{{ str_limit($laptop->short_description, $limit = 250, $end ='...')}} 
                <a href="{{ route('laptops.show', [$laptop->id]) }}">Meer...</a>
            </p>
            <a href="#" class="btn btn-primary">In winkelwagen</a>  
        </div>
    </div>
    @endforeach
</div>



<script>
// wordt niet gebruikt kan eventueel weg.
// <div class="search-box">
    
//     <search-laptop-merk></search-laptop-merk>

// </div>
// Vue.component('search-laptop-merk', {


// props:[],


//     data() {
//         return {
//             checked_names:[]
           
//         }
//     },

//     template: `
//     <div><input type="checkbox" id="acer" value="acer" v-model="checked_names"  @click="searchByBrand">
//     <label for="acer">Acer</label><br>
//     <input type="checkbox" id="apple" value="apple" v-model="checked_names" @click="test" >
//     <label for="apple">Apple</label><br>
//     <input type="checkbox" id="asus" value="asus">
//     <label for="asus">ASUS</label>
//   <br></div>`,


//     methods: {
//         searchByBrand(){
            
//             axios.post('/laptops/'+this.checked_names)
//             .then((response) => {
                  
//             })
//             .catch((error) => {
//             });
//         },

//        markAsRead(notifications_id){
//         axios.delete('/profiles/'+this.attribuutuserid+'/notifications/'+notifications_id)
//         .catch((error) => {
//             });
       
//        } ,

//        test(){
//            console.log(this.checked_names);
//        }

//    },

//    created(){
     
  
//    },

//    mounted() {
//             console.log('Component mounted.')
//         }


// });

// new Vue({
//     el:'#app',


//     data:{
      
     
       
//   },


//  methods:{


// },

// created(){
 

// }




// });



// </script>


@endsection