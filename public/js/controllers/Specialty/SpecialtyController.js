class SpecialtyController extends ConnectionServer{

    /**
     * @param id
     * @returns {Promise<resolve>}
     */
    static delete(id){
        return new Promise(resolve => {
            this.sendRequest('specialty/'+id,'DELETE',null,resolve,true,false)
        })
    }
}
