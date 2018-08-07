@extends('master')

@section('content')


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

<div class="search-menu">
    <div>
        <search-laptop-merk></search-laptop-merk>
    </div>
</div>


<script>
Vue.component('search-laptop-merk', {


props:[],

    data() {
        return {
           
        }
    },

    template:'<p>sdfdsfdsfdsfdsfds</p>',

    methods: {
        getAllNotifications(){
            axios.get('/profiles/'+this.attribuutuserid+'/notifications')
            .then((response) => {
                    if(response.data.length != 0){
                        this.standaardmessage=false;
                        this.showbell=true;
                        this.data=response.data;
                        flash({message:'Uw heeft notificaties', danger:'0'});
                            }else{this.standaardmessage=true;}
            })
            .catch((error) => {
            });
        },

       markAsRead(notifications_id){
        axios.delete('/profiles/'+this.attribuutuserid+'/notifications/'+notifications_id)
        .catch((error) => {
            });
       
       } 

   },

   created(){
  
   },

   mounted() {
            console.log('Component mounted.')
        }


});

new Vue({
    el:'#app',


    data:{
      
     
       
  },


 methods:{


},

created(){
 

}




});



</script>


@endsection