@include('front.layouts.header')

<section class="py-24">
    <h2 class="font-medium text-3xl text-center pb-8">Contact</h2>
    <div class="px-9 py-10 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-1 gap-8">
        <div>
            <form action="" class="flex flex-col gap-4">
                <label for="name">Name</label>
                <input class="p-2 rounded-md lg:w-11/12" type="text" name="name" id="name">

                <label for="phone_number">Phone Number*</label>
                <input class="p-2 rounded-md lg:w-11/12" type="text" name="phone_number" id="phone_number">

                <label for="email">Email</label>
                <input class="p-2 rounded-md lg:w-11/12" type="text" name="email" id="email">

                <label for="subject">Subject</label>
                <input class="p-2 rounded-md lg:w-11/12" type="text" name="subject" id="subject">

                <label for="message">Message</label>
                <textarea class="p-2 rounded-md lg:w-11/12 h-40" name="message" id="message"></textarea>

                <button class="bg-[#6E38D5] lg:w-11/12 text-white py-2 px-4 rounded-md">Send</button>
            </form>
        </div>
        <div>
            <div class="mb-8">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.555939684505!2d5.4938226762829325!3d51.466309013704794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6d8d3f3dacee7%3A0x1acd712bb57b8792!2sSterrenlaan%2010%2C%205631%20KA%20Eindhoven!5e0!3m2!1sen!2snl!4v1716546325397!5m2!1sen!2snl"
                    width="85%" height="370" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div>
                <p>Contact information will be added here soon</p>
            </div>
        </div>
    </div>
</section>

@include('front.layouts.footer')
