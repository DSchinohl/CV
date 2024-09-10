import java.io.*;
import java.util.ArrayList;
import java.util.Scanner;
import java.util.ArrayList;
import java.io.FileWriter;
import java.time.format.DateTimeFormatter;
import java.time.LocalDateTime;
public class database {


    //  CONSTRUCTOR
    database(){};


    //  CLASSES AND VARIABLES
    public ArrayList<workers> new_database = new ArrayList<>();
    public ArrayList<magazine> new_magazine = new ArrayList<>();
    public ArrayList<String> workers_temp_arr = new ArrayList<>();
    public ArrayList<String> daily_tasks_arr = new ArrayList<>();
    public ArrayList<archives> new_archives_arr = new ArrayList();

    //  ADDING INTO BASES (WORKERS/MAGZINES)
    void add_worker_to_base(String name, String surname, String pesel, String work_beginning_date){


        workers worker = new workers() {
            @Override
            void add_worker(String name, String surname, String pesel, String work_beginning_date) {
                this.name = name;
                this.surname = surname;
                this.pesel = pesel;
                this.work_beginning_date = work_beginning_date;

            }

            @Override
            void get_all() {
                System.out.println(this.name+""+this.surname+""+this.pesel+""+this.work_beginning_date);
            }
        };
        worker.add_worker(name,surname,pesel,work_beginning_date);
        into_list(worker);


    }

    void add_magazine_to_base(String location,material_type type,float metrage){
        magazine magazine =new magazine() {
            @Override
            void add_magazine(String location, material_type type, float metrage) {
                this.location = location;
                this.type = type;
                this.metrage = metrage;
            }
        };

        magazine.add_magazine(location,type,metrage);
        into_list(magazine);
    }

    //  INSERTING INTO ARRAYS
    void into_list(workers class_name){
        new_database.add(class_name);
    }
    void into_list(magazine class_name){
        new_magazine.add(class_name);
    }


    //  LOADING INTO FILES
    void out_from_workers_file(){
        //  JAKUB'S NOWAK PART
        File new_file = new File("workers.txt");
        try (BufferedReader br = new BufferedReader(new FileReader(new_file))) {
            String line;
            while ((line = br.readLine()) != null) {
                String[] userData = line.split(",");

                if (userData.length == 4) {
                    String name,surname,pesel,work_beggining;
                    name = userData[0];
                    surname = userData[1];
                    pesel = userData[2];
                    work_beggining = userData[3];
                    add_worker_to_base(name,surname,pesel,work_beggining);
                }
            }
        } catch (IOException e) {
            System.out.println("Error during open a file");

        }
    }

    void out_from_magazine_file(){
        //  JAKUB'S NOWAK PART
        File new_file = new File("magazines.txt");
        try (BufferedReader br = new BufferedReader(new FileReader(new_file))) {
            String line;
            while ((line = br.readLine()) != null) {
                String[] userData = line.split(",");

                if (userData.length == 3) {
                    String location;
                    material_type type;
                    float metrage;
                    location = userData[0];
                    type = material_type.valueOf(userData[1]);
                    metrage = Float.parseFloat(userData[2]);

                    add_magazine_to_base(location,type,metrage);
                }
            }
        } catch (IOException e) {
            System.out.println("Error during open a file");

        }
    }

    //  VIEWS
    void view_workers_list(){
        for(workers e:new_database){
            System.out.println(e.name+" "+e.surname+" "+e.pesel+" "+e.work_beginning_date);
        }
    }

    void view_magazine_list(){
        for(magazine e:new_magazine){
            System.out.println(e.location+" "+e.type+" "+e.metrage);
        }
    }

    //  DELETES
    void delete_worker(String pesel){
        workers temp_worker = new workers() {
            @Override
            void add_worker(String name, String surname, String pesel, String work_beginning_date) {

            }

            @Override
            void get_all() {

            }
        };

        for(workers e:new_database){
            if(e.pesel.equals(pesel)){
                temp_worker = e;
            }
        }
        new_database.remove(temp_worker);
    }

    void delete_magazine(String location){
        magazine temp_magazine = new magazine() {
            @Override
            void add_magazine(String location, material_type type, float metrage) {

            }
        };

        for(magazine e:new_magazine){
            if(e.location.equals(location)){
                temp_magazine = e;
            }
        }

        new_magazine.remove(temp_magazine);
    }

    void daily_task_menagement(String pesel,String location, float metrage,String work_placement) throws IOException {

        String task_menager = "";
        boolean is_magazine = false;
        boolean is_worker = false;
        boolean is_worker_added = false;
        boolean is_worker_busy = false;


        DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy/MM/dd HH:mm:ss");
        LocalDateTime now = LocalDateTime.now();
        String temp = now.toString();
        temp = temp.substring(0,10);

        for(archives element:new_archives_arr){
            if(temp.equals(element.timestamp) && element.pesel.equals(pesel)){
                is_worker_busy = true;
            }
        }
        if(!is_worker_busy){
            for(magazine e:new_magazine){

                if(e.location.equals(location)){

                    if(e.metrage > 0.0f) {

                        if (e.metrage - metrage < 0) {
                            task_menager += e.metrage + "m2," + e.location + "," + e.type + "," + work_placement;
                            e.metrage = 0;
                        } else {
                            e.metrage = e.metrage - metrage;
                            task_menager += metrage + "m2," + e.location + "," + e.type + "," + work_placement;
                        }
                        is_magazine = true;
                    }
                }

            }
        }

        for(String a:workers_temp_arr){
            if(a.contains(pesel)){
                is_worker_added = true;
            }
        }
        for(workers e:new_database){
            if(e.pesel.equals(pesel)){
                task_menager += ","+e.name+","+e.surname+","+e.pesel;
                is_worker = true;
                workers_temp_arr.add(pesel);
            }

        }

        if(is_worker && is_magazine && !is_worker_added && !is_worker_busy) {
            daily_tasks_arr.add(task_menager);
            upload_to_daily(daily_tasks_arr);

            String name = "menagement_history.txt";
            FileWriter myWriter4 = new FileWriter("menagement_history.txt",true);
            task_menager += ","+temp;
            myWriter4.write(task_menager);
            myWriter4.write(System.lineSeparator());
            create_log(name);
            myWriter4.close();
        }
        else{
            if(!is_worker){
                System.out.println("There is not Worker like entered!");
            }
            if(!is_magazine){
                System.out.println("There is not magazine like entered!");
            }
            if(is_worker_added){
                System.out.println("Worker is already added!");
            }
            if(is_worker_busy){
                System.out.println("Worker is busy that day!");
            }
        }

    }

    void view_resources(){
        for(magazine e:new_magazine){
            System.out.println(e.location+" "+e.type+" "+e.metrage);
        }
    }

    void add_resources(String location,float bought){
        for(magazine e:new_magazine){
            if(e.location == location && bought > 0){
                e.metrage += bought;
            }
        }
    }

    void upload_magazine_to_file() throws IOException {

        String name = "magazines.txt";
        FileWriter myWriter1 = new FileWriter(name,false);
        for(magazine element0 : new_magazine){
            myWriter1.write(element0.location+","+element0.type+","+element0.metrage);
            myWriter1.write(System.lineSeparator());
        }

        create_log(name);
        myWriter1.close();
    }
    void upload_worker_to_file() throws IOException {

        String name = "workers.txt";
        FileWriter myWriter2 = new FileWriter(name,false);
        for(workers element1 : new_database){
            myWriter2.write(element1.name+","+element1.surname+","+element1.pesel+","+element1.work_beginning_date);
            myWriter2.write(System.lineSeparator());
        }

        create_log(name);
        myWriter2.close();

    }

    private void upload_to_daily(ArrayList<String> arr) throws IOException {

        String name = "daily_menagement.txt";
        FileWriter myWriter4 = new FileWriter("daily_menagement.txt",false);

        for(String element:arr){
            myWriter4.write(element);
            myWriter4.write(System.lineSeparator());
        }
        create_log(name);
        myWriter4.close();
    }

    void out_from_menagement_history_file(){
        File new_file = new File("menagement_history.txt");
        try (BufferedReader br = new BufferedReader(new FileReader(new_file))) {
            String line;
            while ((line = br.readLine()) != null) {
                String[] userData = line.split(",");

                if (userData.length == 8) {
                    String metrage;
                    String location;
                    material_type material;
                    String destination;
                    String name;
                    String surname;
                    String pesel;
                    String timestamp;
                    metrage = userData[0];
                    location = userData[1];
                    material = material_type.valueOf(userData[2]);
                    destination = userData[3];
                    name = userData[4];
                    surname = userData[5];
                    pesel = userData[6];
                    timestamp = userData[7];

                    archives new_archives = new archives(metrage,location,material,destination,name,surname,pesel,timestamp);
                    new_archives_arr.add(new_archives);
                }
            }
        } catch (IOException e) {
            System.out.println("Error during open a file");

        }
    }
    void archive_list(){
        for(archives element:new_archives_arr){
            System.out.println(element.name+","+element.surname+","+element.pesel+","+element.timestamp+","+element.material+","+element.location+","+element.destination);
        }
    }

    private void create_log(String file_name) throws IOException {
        DateTimeFormatter dft = DateTimeFormatter.ofPattern("yyyy/MM/dd HH:mm:ss");
        LocalDateTime now = LocalDateTime.now();
        String now_temp = now.toString();
        file_name = "log_"+ file_name;

        FileWriter myWriter = new FileWriter(file_name,true);
        myWriter.write(now_temp);
        myWriter.write(System.lineSeparator());
        myWriter.close();
    }
}
