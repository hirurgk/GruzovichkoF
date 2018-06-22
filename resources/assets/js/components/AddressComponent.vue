<template>
    <div class="container">
        <div class="row">
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="adrress">Адрес</span>
				</div>
				<input type="text" class="form-control" placeholder="Введите адрес" v-model="requestAddress" @keyup="getAddress">

				<div class="container dropdown-menu" v-show="isDropdownVisible">
					<a class="dropdown-item" href="javascript: void(0)" v-for="address in arAddress" @click="selectAddress">{{address}}</a>
				</div>
			</div>
        </div>
    </div>
</template>

<style>
	.dropdown-menu {
		display: block;
	}
</style>

<script>
    export default {
		data: function() {
			return {
				requestAddress: '',
				arAddress: [],
				isDropdownVisible: false,
				
				//Задержка перед отправкой запроса после ввода (чтобы не отправлять запрос, если пользователь быстро печатает адрес) в мс
				timeWaitKeydown: 200
			}
		},

		props: [
			'minaddresslength'
		],
		
        mounted() {
            //
        },
		
		methods: {
			getAddress: function() {
				clearTimeout(this.timerKeyup);
				
				
				this.timerKeyup = setTimeout(() => {
					
					//Скрываем выпадающий список
					this.isDropdownVisible = false;

					//Если строка меньше положенного
					if (this.requestAddress.length < this.minaddresslength)
						return false;

					//Запрос адресов
					axios.get('/get-address', {params: {address: this.requestAddress}}).then((res) => {
						if (res.data.length) {
							//Заполним выпадающий список и отобразим его
							this.arAddress = res.data;
							this.isDropdownVisible = true;
						}
					});
					
				}, this.timeWaitKeydown);
			},

			//Выбор адреса из выпадающего списка
			selectAddress: function(e) {
				this.requestAddress = e.target.innerText;
				this.isDropdownVisible = false;
			}
		}
    }
</script>
