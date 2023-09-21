<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Task</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                  <tr class="bg-light">
                    <th width="25%">No</th>
                    <th width="25%">Title</th>
                    <th width="25%">Description</th>                   
                    <th width="25%">Action</th>
                </tr>
                </thead>
                <tbody id="tableList">
                {{--Table Data--}}
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
        taskList()
        
        async function taskList(){
            
            let res=await axios.get('/task-list');
           
            let tableData=$('#tableData');
            let tableList=$('#tableList');

            tableData.DataTable().destroy()
            tableList.empty()        

            res.data.forEach(function(item,index){

                let row=`
                        <tr>
                            <td>${index+1}</td>
                            <td>${item.title}</td>
                            <td class="w-25">${item.description}</td>
                                            
                            <td>
                                <button data-id=${item.id} class="edit btn btn-sm btn-outline-primary"> Edit</button> 
                                <button data-id=${item.id} class="delete btn btn-sm btn-outline-primary"> Delete</button>
                                <button data-id=${item.id} class="show btn btn-sm btn-outline-primary">Show</button>
                            </td>                       
                        </tr>
                    `
                  
                tableList.append(row)
            })
           
          
            $('.edit').on('click',async function(){

                let id=$(this).data('id');                
                await getTaskId(id)
                $('#update-modal').modal('show')
                
            })

            $('.delete').on('click',function(){
                let id=$(this).data('id')              
                $('#delete-modal').modal('show')
                $('#taskId').val(id)

            })
            $('.show').on('click',function(){
                let id=$(this).data('id')             
                taskShowById(id)               
                $('#show-modal').modal('show')               

            })          


            tableData.DataTable({
                order:[['0','desc']],
                lengthMenu:[5,10,10,20,30,40,50],
                language:{
                    paginate:{
                        next:'&#8594;',
                        previous:'&#8592;',
                    }
                }
            })
        }
</script>