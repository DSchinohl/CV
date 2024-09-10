public class archives {
    archives(String metrage, String location, material_type material, String destination, String name, String surname, String pesel, String timestamp){
        this.metrage = metrage;
        this.location = location;
        this.material = material;
        this.destination = destination;
        this.name = name;
        this.surname = surname;
        this.pesel = pesel;
        this.timestamp = timestamp;
    };

    String metrage,location,destination,name,surname,pesel,timestamp;
    material_type material;


}
