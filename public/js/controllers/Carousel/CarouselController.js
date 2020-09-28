class CarouselController extends ConnectionServer{

    /**
     * @param id
     * @returns {Promise<resolve>}
     */
    static delete(id){
        return new Promise(resolve => {
            this.sendRequest('carousel/'+id,'DELETE',null,resolve,true,false)
        })
    }
}
