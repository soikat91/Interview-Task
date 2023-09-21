
<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="updateTitle">
                                <input type="hidden" class="form-control" id="taskID">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Description *</label>
                                <input type="text" class="form-control" id="updateDescription">
                            </div>    
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update-model-close" class="btn  btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button  type="submit" class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    async function getTaskId(id) {

        document.getElementById('taskID').value=id;  
        let res=await axios.post('/get-task-id',{id:id})
        document.getElementById('updateTitle').value=res.data['title']
        document.getElementById('updateDescription').value=res.data['description']      
        
        
    }


 $('#updateData').on('submit',async function(e){

        e.preventDefault()

        let title= document.getElementById('updateTitle').value      
        let description= document.getElementById('updateDescription').value    
        let taskID= document.getElementById('taskID').value    

        document.getElementById('model-close').click();
        if(title.length===0){
        errorToast('Title Required')
        }else if(description.length===0){
        errorToast('Description Required')
        }else{            
        document.getElementById('update-model-close').click()

        showLoader()
        let res=await axios.post('/task-update',{
            title:title,
            description:description,               
            id:taskID})
        hideLoader()
        if(res.status===200 && res.data===1){
            successToast("Update Success")
            $('#update-modal').trigger("reset") 
            await taskList()
        }else{
            errorToast("Failed Request")
        }

        }
    })


   

</script>
