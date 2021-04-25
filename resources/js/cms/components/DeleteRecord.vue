<template>
    <div>
        <button class="ui red button" @click="confirmDelete" >Delete</button>
    </div>
</template>

<script>
    export default {
        props: ['model', 'model2', 'model3', 'id', 'id2', 'id3'],
        data() {
            return {
                loading: false,
                redirectPath: null
            }
        },
        computed: {
            token () {
                return window.csrf_token
            },
            api () {
                if(this.model3) {
                    this.redirectPath = `/cms/${this.model}/${this.id}/${this.model2}/${this.id2}/`
                    return `/cms/${this.model}/${this.id}/${this.model2}/${this.id2}/${this.model3}/${this.id3}`
                } else if (this.model2) {
                    this.redirectPath = `/cms/${this.model}/${this.id}`
                    return `/cms/${this.model}/${this.id}/${this.model2}/${this.id2}`
                }else{
                    this.redirectPath = `/cms/${this.model}`
                    return `/cms/${this.model}/${this.id}`
                }
            }
        },
        methods: {
            confirmDelete () {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C4472',
                    cancelButtonColor: '#f05252',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.deleteRecord()
                    }
                });
            },
            deleteRecord () {
                axios.delete(this.api, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-Token': this.token,
                    }
                })
                .then(response => {
                    this.$emit('updated')
                    if(response.data === 'deleted') {
                        this.$swal({
                            toast: true,
                            position: 'center',
                            showConfirmButton: false,
                            timer: 3000,
                            title: 'Record',
                            text: 'successfully deleted!',
                        });
                        window.location.href = this.redirectPath;
                    }else{
                        this.$swal({
                            toast: true,
                            position: 'center',
                            showConfirmButton: false,
                            timer: 3000,
                            title: 'Something went wront!',
                            text: 'please try again later',
                        });
                    }

                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
