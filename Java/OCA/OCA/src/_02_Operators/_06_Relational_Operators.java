package _02_Operators;

public class _06_Relational_Operators
{
    public static void main(String[] args)
    {
        int x = 10;
        int y = 20;
        int z = 10;


        System.out.println("x < y :" + (x < y));              //  true
        System.out.println("x <= y :" + (x <= y));            //  true
        System.out.println("x >= z :" + (x >= z));            //  true
        System.out.println("x > z :" + (x > z));              //  false

        int a = 10;
        long b = 5L;
        double c = 7.5;

        System.out.println("a < b :" + (a < b));              //  false
        System.out.println("a > c :" + (a > c));              //  true

        int d = 12;
        long e = 15L;
        double f = 14.5;

        System.out.println((d < e) + " " + (e > f));          // true true
    }
}
