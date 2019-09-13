<template>
	<div class="table-responsive">
        <table class="table table-bordered table-hover table-users">
            <thead>
                <tr class="table-active">
                    <th class="text-center">ID</th>
                    <th>Email</th>
                    <th>Тип пользователя</th>
                    <th>Действия</th>
                    <th>Верифицировать</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user, index in users">
                    <th class="text-center">{{ index+1 }}</th>
                    <td>{{ user.email }} <span class="badge badge-danger" v-if="user.deleted_at !== null">ЗАБАНЕН {{ user.deleted_at }}</span></td>
                    <td class="td_type">
                    	<div v-if="user.isExecutor === 1">
							<div class="alert alert-primary" role="alert">Заказчик</div>
						</div>
						<div v-else-if="user.isExecutor === 0">
							<div class="alert alert-primary" role="alert">Исполнитель</div>
						</div>
						<div v-else-if="user.isExecutor === 2">
							<div class="alert alert-primary" role="alert">Диспетчер</div>
						</div>
						<div v-else>
							<div class="alert alert-success" role="alert">Администратор</div>
						</div>
	                </td>
                    <td class="td_last">
                        <a v-bind:href="'./user/'+user.id" class="btn btn-sm btn-primary">Подробнее</a>
                        <a href="#" class="btn btn-sm btn-success" v-if="user.deleted_at !== null" v-on:click.prevent="unBanUser(user.id, index+1)">Разбанить</a>
                        <a href="#" class="btn btn-sm btn-warning" v-if="user.deleted_at === null" v-on:click.prevent="banUser(user.id, index+1)">Забанить</a>
                        <a href="#" class="btn btn-sm btn-danger" v-on:click.prevent="deleteUser(user.id, index)">Удалить</a>
                    </td>
                    <td class="td_type">
                        <a href="#" class="btn btn-sm btn-success" v-if="user.passport.verify === 0" v-on:click.prevent="verifyUser(user.id, index+1)">Подтвердить</a>
                        <a href="#" class="btn btn-sm btn-warning" v-if="user.passport.verify === 1" v-on:click.prevent="unVerifyUser(user.id, index+1)">Отменить</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
	data: function () {
		return {
			users: [],
		}	
	},
	mounted() {
		var app = this;
		axios.get('/api/users')
			.then(function (resp) {
			app.users = resp.data;
		})
		.catch(function (resp) {
			console.log(resp);
			alert("Не удалось загрузить пользователей");
		});
	},
	methods: {
		deleteUser(id, index) {
			if (confirm("Вы действительно хотите удалить пользователя?")) {
				var app = this;
				axios.delete('/api/users/' + id)
					.then(function (resp) {
						app.users.splice(index, 1);
					})
					.catch(function (resp) {
						alert("Не удалось удалить пользователя");
					});
			}
		},
		banUser(id, index) {
			if (confirm("Вы действительно хотите забанить пользователя?")) {
				var app = this;
				axios.delete('/api/userBan/' + id)
					.then(function (resp) {
						console.log(resp);
						app.users[index-1].deleted_at = resp.data[0].deleted_at;
					})
					.catch(function (resp) {
						alert("Не удалось забанить пользователя");
					});
			}
		},
		unBanUser(id, index) {
			if (confirm("Вы действительно хотите разбанить пользователя?")) {
				var app = this;
				axios.get('/api/userUnBan/' + id)
					.then(function (resp) {
						app.users[index-1].deleted_at = null;
					})
					.catch(function (resp) {
						alert("Не удалось раззабанить пользователя");
					});
			}
		},
		verifyUser(id, index) {
			if (confirm("Вы действительно хотите подтвердить верифицировать?")) {
				var app = this;
				axios.get('/api/verifyUser/' + id)
					.then(function (resp) {
						console.log(resp);
						app.users[index-1].passport.verify = 1;
					})
					.catch(function (resp) {
						alert("Не удалось подтвердить верифицировать");
					});
			}
		},
		unVerifyUser(id, index) {
			if (confirm("Вы действительно хотите отменить верификацию?")) {
				var app = this;
				axios.delete('/api/unVerifyUser/' + id)
					.then(function (resp) {
						app.users[index-1].passport.verify = 0;
					})
					.catch(function (resp) {
						alert("Не удалось отменить верификацию");
					});
			}
		}
	}
}
</script>
