<template>
    <Head title="Главная"/>
    <MainLayout>
        <div class="title">Конфигуратор входной двери</div>

        <div class="main">
            <div class="main_first">
                <div class="main_div main_div--first" ref="firstImg">
                    <img class="main_wrapper"
                         :src="'../storage/envelope/'+b_select.code+'.jpg'"
                         alt="">
                    <img class="main_img" :src="'../storage/envelope/'+a_select.code+'.jpg'"
                         alt="">
                    <img class="main_knob--first" :src="'../storage/knob/'+c_select.code+'.png'"
                         alt="">
                    <div class="desc">ВИД СНАРУЖИ</div>
                </div>

                <div class="main_div main_div--second" ref="secondImg">
                    <img class="main_wrapper"
                         :src="'../storage/envelope/'+b_select.code+'.jpg'"
                         alt="">
                    <img class="main_img" :src="'../storage/envelope/'+a_select.code+'.jpg'"
                         alt="">
                    <img class="main_knob--second" :src="'../storage/knob/'+c_select.code+'.png'"
                         alt="">
                    <div class="desc">ВИД ИЗНУТРИ</div>
                </div>
            </div>
            <div class="main_second">
                <div class="title">Параметры</div>

                <div class="select_div">
                    <div class="select_div--item">
                        <div class="select_div--item_title">Цвет покраски</div>
                        <select name="select_div--item_select" v-model="a_select" @change="changeResultPrice">
                            <option :value="item" v-for="(item, index) in paint_colors" :key="index"
                                    :data-price="item.price">{{ item.title }}
                            </option>
                        </select>
                    </div>

                    <div class="select_div--item">
                        <div class="select_div--item_title">Цвет плёнки</div>
                        <select name="select_div--item_select" v-model="b_select" @change="changeResultPrice">
                            <option :value="item" v-for="(item, index) in film_colors" :key="index"
                                    :data-price="item.price">{{ item.title }}
                            </option>
                        </select>
                    </div>

                    <div class="select_div--item">
                        <div class="select_div--item_title">Цвет ручки</div>
                        <select name="select_div--item_select" v-model="c_select" @change="changeResultPrice">
                            <option :value="item" v-for="(item, index) in handle_colors" :key="index"
                                    :data-price="item.price">{{ item.title }}
                            </option>
                        </select>
                    </div>

                    <div class="select_div--item">
                        <div class="select_div--item_title">Ширина</div>
                        <select name="select_div--item_select" v-model="d_select" @change="changeResultPrice">
                            <option :value="item" v-for="(item, index) in widths" :key="index"
                                    :data-price="item.price">{{ item.title }} мм
                            </option>
                        </select>
                    </div>

                    <div class="select_div--item">
                        <div class="select_div--item_title">Высота</div>
                        <select name="select_div--item_select" v-model="e_select" @change="changeResultPrice">
                            <option :value="item" v-for="(item, index) in heights" :key="index"
                                    :data-price="item.price">{{ item.title }} мм
                            </option>
                        </select>
                    </div>

                    <div class="select_div--item">
                        <div class="select_div--item_title">Открывание</div>
                        <select name="select_div--item_select" v-model="f_select" @change="changeResultPrice">
                            <option :value="item" v-for="(item, index) in openings" :key="index"
                                    :data-price="item.price">{{ item.title }}
                            </option>
                        </select>
                    </div>

<!--                    <div class="select_div&#45;&#45;item">-->
<!--                        <div class="select_div&#45;&#45;item_title">Аксессуары</div>-->
<!--                        <select name="select_div&#45;&#45;item_select" v-model="g_select" @change="changeResultPrice">-->
<!--                            <option selected value="g0">Таволато орех</option>-->
<!--                            <option value="g1">Таволато орех</option>-->
<!--                            <option value="g2">Таволато орех</option>-->
<!--                        </select>-->
<!--                    </div>-->
                </div>

                <div class="finish">Итого:&nbsp;&nbsp;&nbsp;&nbsp;<b>{{ result_price }} руб.</b></div>
                <button type="submit" class="btn" @click.prevent="createProduct">Оплатить комплектацию</button>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Head} from '@inertiajs/vue3'

export default {
    name: "Index",
    components: {
        MainLayout,
        Head
    },
    data() {
        return {

            // Текущие значения
            a_select: {
                price: 0,
                code: 'a1',
                title: 'Венге кантри'
            },
            b_select: {
                price: 0,
                code: 'b2',
                title: 'Венге кантри'
            },
            c_select: {
                price: 0,
                code: 'c0',
                title: 'LINE'
            },
            d_select: {
                price: 0,
                code: 'd0',
                title: '880'
            },
            e_select: {
                price: 0,
                code: 'e0',
                title: '1950'
            },
            f_select: {
                price: 0,
                code: 'f0',
                title: 'Правое'
            },
            g_select: 'g1',

            // Объкеты из бд
            result_price: null,
            paint_colors: null,
            film_colors: null,
            handle_colors: null,
            widths: null,
            heights: null,
            openings: null
        }
    },

    methods: {
        // Получаем дилерскую цену
        changeResultPrice: function () {
            if (this.f_select.code === 'f1') {
                this.$refs.firstImg.style.transform = 'scale(-1, 1)';
                this.$refs.secondImg.style.transform = 'scale(-1, 1)';
            } else {
                this.$refs.firstImg.style.transform = 'scale(1, 1)';
                this.$refs.secondImg.style.transform = 'scale(1, 1)';
            }
            this.result_price = parseInt(this.a_select.price) + parseInt(this.b_select.price) + parseInt(this.c_select.price) +
                parseInt(this.d_select.price) + parseInt(this.e_select.price) + parseInt(this.f_select.price)
        },

        // Получаем цвет покраски
        getPaintColors() {
            axios.get('api/get_paint_colors')
                .then((response) => {
                    this.paint_colors = response.data
                })
        },

        // Получаем цвет плёнки
        getFilmColors() {
            axios.get('api/get_film_colors')
                .then((response) => {
                    this.film_colors = response.data
                })
        },

        // Получаем цвет ручки
        getHandleColors() {
            axios.get('api/get_handle_colors')
                .then((response) => {
                    this.handle_colors = response.data
                })
        },

        // Получаем ширину
        getWidths() {
            axios.get('api/get_widths')
                .then((response) => {
                    this.widths = response.data
                })
        },

        // Получаем высоту
        getHeight() {
            axios.get('api/get_heights')
                .then((response) => {
                    this.heights = response.data
                })
        },

        // Получаем открывание
        getOpening() {
            axios.get('api/get_opening')
                .then((response) => {
                    this.openings = response.data
                })
        },

        createProduct() {
            axios.post('api/create_product', {
                paint_colors: this.a_select.code,
                film_colors: this.b_select.code,
                handle_colors: this.c_select.code,
                widths: this.d_select.code,
                heights: this.e_select.code,
                opening: this.f_select.code,
                total_price: this.result_price
            })
                .then(() => {
                    // this.$inertia.visit('/invoices/download', {
                    //     method: 'GET',
                    //     data: {
                    //         paint_colors: this.a_select.code,
                    //         film_colors: this.b_select.code,
                    //         handle_colors: this.c_select.code,
                    //         widths: this.d_select.code,
                    //         heights: this.e_select.code,
                    //         opening: this.f_select.code,
                    //         total_price: this.result_price
                    //     }
                    // })
                    window.location.href = '/invoices/download?film_colors='+this.b_select.code+'&handle_colors='+this.c_select.code+'&widths=700&heights=500&opening='+this.f_select.code+'&total_price='+this.result_price+'&paint_colors='+this.a_select.code+''
                })
        },

        init() {
            this.changeResultPrice();
            this.getPaintColors();
            this.getFilmColors();
            this.getHandleColors();
            this.getWidths();
            this.getHeight();
            this.getOpening();
        }
    },

    mounted() {
        this.init();
    }
}
</script>
