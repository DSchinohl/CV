import java.io.IOException;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) throws IOException {


        database new_database = new database();

        //INSERTING INTO DATABASE
        new_database.out_from_workers_file();
        new_database.out_from_magazine_file();
        new_database.out_from_menagement_history_file();

        //DAILY TASKS AND ARCHIVING
        new_database.view_workers_list();
        System.out.println("\n");
        new_database.view_magazine_list();

        //DAILY TASKS
        System.out.println("\n");

        new_database.daily_task_menagement("72999186452","Rabka",1.0f,"Rdzawka");
        new_database.daily_task_menagement("66576389972","Rabka",1.0f,"Rdzawka");
        System.out.println("\n");
        new_database.archive_list();


        //UPLOADS TO FILES
        new_database.upload_magazine_to_file();
        new_database.upload_worker_to_file();

    }
}