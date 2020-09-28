class BlogController extends ConnectionServer{

    /**
     * @param id
     * @returns {Promise<resolve>}
     */
    static delete(id){
        return new Promise(resolve => {
            this.sendRequest('blog/'+id,'DELETE',null,resolve,true,false)
        })
    }
}
