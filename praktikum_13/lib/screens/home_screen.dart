import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../models/cart_model.dart';
import '../models/item.dart';
import 'cart_screen.dart';
 
class HomeScreen extends StatelessWidget {
  HomeScreen({super.key});
 
  // Menggunakan 'const' agar tidak ada error pada list
  final List<Item> availableItems = [
    Item(name: "Kopi XYZ", price: 4500),
    Item(name: "Teh Segitiga", price: 5000),
    Item(name: "Fonta 1500ml", price: 15000),
    Item(name: "Cola-Cola 1500ml", price: 15000),
    Item(name: "Sara Roti", price: 6000),
    Item(name: "Teh Ujung", price: 5000),
    Item(name: "Teh Botol", price: 5000),
    Item(name: "Roti Q", price: 13000)
  ];
 
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Seven Twelve"),
        actions: [
          IconButton(
            icon: const Icon(Icons.shopping_cart),
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (context) => const CartScreen()),
              );
            },
          ),
        ],
      ),
      body: ListView.builder(
        itemCount: availableItems.length,
        itemBuilder: (context, index) {
          final item = availableItems[index];
          return ListTile(
            title: Text(item.name),
            subtitle: Text("Rp ${item.price}.00"),
            trailing: ElevatedButton(
              onPressed: () {
                Provider.of<CartModel>(context, listen: false).add(item);
              },
              child: const Text("Tambah"),
            ),
          );
        },
      ),
    );
  }
}