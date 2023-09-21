<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Description *</label>
                                <input type="text" class="form-control" id="description">
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="model-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button  type="submit" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
        $('#insertData').on('submit',async function(e){
            e.preventDefault()

            let title=document.getElementById("title").value;
            let description=document.getElementById("description").value;
        
            document.getElementById('model-close').click();
            if(title.length===0){

                errorToast('title required')
            }else if(description.length===0){
                errorToast('Description required')
            }else{

                $('#create-modal').modal('hide') //jquery use
               
                showLoader();
                let res=await axios.post('/task-create',{
                    title:title,
                    description:description
                   
                })
                hideLoader();
                if(res.status==201){
                    successToast('Created Success')
                    $('#create-modal').trigger("reset") 
                    await taskList()
                }else{
                    errorToast('Request Failed')
                }

            }
        })

</script>




