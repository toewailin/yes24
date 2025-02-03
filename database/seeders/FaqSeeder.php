<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            ['question' => 'How do I place an order?', 'answer' => 'To place an order, browse our products, add them to your cart, and proceed to checkout.'],
            ['question' => 'What payment methods do you accept?', 'answer' => 'We accept credit/debit cards, PayPal, and other local payment methods depending on your region.'],
            ['question' => 'Can I track my order?', 'answer' => 'Yes, you can track your order by logging into your account and checking the order status.'],
            ['question' => 'How long does shipping take?', 'answer' => 'Shipping times vary based on location. Generally, it takes 5-7 business days for standard shipping.'],
            ['question' => 'Do you offer international shipping?', 'answer' => 'Yes, we ship to multiple countries worldwide. Shipping rates and times vary.'],
            ['question' => 'How can I return or exchange an item?', 'answer' => 'You can initiate a return or exchange within 14 days of receiving your order by contacting customer support.'],
            ['question' => 'What is your refund policy?', 'answer' => 'Refunds are processed within 5-7 business days after the returned item is received and inspected.'],
            ['question' => 'Do you offer discounts or promotions?', 'answer' => 'Yes, we frequently offer discounts and promotions. Subscribe to our newsletter for updates.'],
            ['question' => 'How can I contact customer support?', 'answer' => 'You can reach our support team via email, live chat, or phone during business hours.'],
            ['question' => 'Can I cancel my order after placing it?', 'answer' => 'Orders can only be canceled within 12 hours of placement. Contact support for assistance.'],
            ['question' => 'Do you have a loyalty program?', 'answer' => 'Yes, we offer a rewards program where you can earn points for purchases and redeem them for discounts.'],
            ['question' => 'Are my payment details secure?', 'answer' => 'Yes, we use industry-standard encryption to protect your payment information.'],
            ['question' => 'Do you have a physical store?', 'answer' => 'We are an online-only store, but we occasionally host pop-up events.'],
            ['question' => 'Can I change my shipping address after placing an order?', 'answer' => 'You may change your address within 12 hours of order placement by contacting support.'],
            ['question' => 'Do you sell gift cards?', 'answer' => 'Yes, we offer digital gift cards that can be used for any purchase on our website.'],
            ['question' => 'What if I receive a damaged or defective item?', 'answer' => 'If you receive a damaged item, contact us immediately with photos for a replacement or refund.'],
            ['question' => 'Can I preorder items?', 'answer' => 'Yes, we offer preorders for select products. Check the product page for details.'],
            ['question' => 'Do you offer bulk discounts for large orders?', 'answer' => 'Yes, we provide special pricing for bulk orders. Contact us for more information.'],
            ['question' => 'How can I reset my password?', 'answer' => 'Go to the login page, click "Forgot Password," and follow the instructions to reset your password.'],
            ['question' => 'Do you have a mobile app?', 'answer' => 'We are currently developing a mobile app to enhance your shopping experience. Stay tuned!'],
        ];

        foreach ($faqs as $index => $faq) {
            DB::table('faqs')->insert([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'is_active' => true,
                'order' => $index + 1, // Ordering FAQs sequentially
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
