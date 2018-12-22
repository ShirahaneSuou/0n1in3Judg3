#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <time.h>
#include <ctype.h>

#ifdef __WINDOWS
	#include <windows.h>
#endif 

#ifdef __UNIX64
	#include <sys/resource.h>
	#include <sys/time.h>
    #include <sys/wait.h>
	#include <sys/syscall.h>
	#include <sys/reg.h>
	#include <fcntl.h>
	#include <unistd.h>
	#include <errno.h>
	#include <signal.h>
#endif 

#define MAX_BUFF_SIZE 		1024

#define PID_FILE			"judger.pid"
#define REDICT_STDIN		"data.in"
#define REDICT_STDOUT		"user.out"
#define REDICT_STDERR		"err.info"

#define DATA_IN 	REDICT_STDIN
#define DATA_OUT	"data.out"
#define USER_OUT	REDICT_STDOUT

#define LOG_SYS_ERR "sysERROR.log"
#define LOG_SQL_ERR "sqlERROR.log"

#define LAN_CPP 0
#define LAN_C 1
#define LAN_JAVA 3
#define TOTAL_LAN 3

#define OJ_AC 1
#define OJ_WA 2
#define OJ_TLE 3
#define OJ_MLE 4
#define OJ_RE 5
#define OJ_OLE 6
#define OJ_CE 7
#define OJ_SE 8
#define OJ_QU 9
#define OJ_CL 10
#define OJ_RN 11

#define ERROR_ON(cond, msg) do { 							\
	if(cond) {												\
		fprintf(stderr, "In file %s function:[%s]: %d: ", __FILE__, __FUNCTION__, __LINE__);	\
		perror(msg);										\
		return -1;											\
	}														\
}while(0); 													


const char* cmd[] = {
	"g++ -std=c++14 -O2 -w \"%s\" -o \"%s\"",
	"gcc -std=c++11 -O2 -w \"%s\" -o \"%s\"",
	NULL
};

#ifdef __UNIX64
// C and C++
const int ALLOW_SYS_CALL_C[] = {0,1,2,3,4,5,8,9,11,12,20,21,59,63,89,158,231,240, 
	SYS_time, SYS_read, SYS_uname, SYS_write, 
	SYS_open, SYS_close, SYS_execve, SYS_access, 
	SYS_brk, SYS_munmap, SYS_mprotect, SYS_mmap, 
	SYS_fstat, SYS_set_thread_area, 252, SYS_arch_prctl, 0 };
#endif

static void trim(char *str) {
	char buf[MAX_BUFF_SIZE];
	char *start;
	char *end;

	strcpy(buf, str);
	start = buf;
	while((*start) == ' '|| (*start) == '\t' || (*start) == '\n' || (*start) == '\v')
		start++;
	end = start;
	while((*end) != ' ' && (*end) != '\t' && (*end) != '\n' && (*end) != '\v')
		end++;
	end = '\0';
	strcpy(str, start);
}

static int work() {
}

int compile(int lang, const char* cFile, const char* runId)
{

}

int setCpeLimit(int timeLimit, int memLimit)
{

}

int setRunLimit(int timeLimit, int memLimit, int staLimit)
{
	// Time Limit 
	// sturct itimerval timer;
	// gettimeofday (&timer.it_value, NULL); 
	// timer.it_interval.tv_usec = timer.it_interval.tv_sec = 0;
	// timer.it_value.tv_sec = timeLimit / 1000; // seconds
	// timer.it_value.tv_usec = timeLimit % 1000 * 1000; //microseconds
	// ERROR_ON(setitimer (ITIMER_REAL, &timer, NULL), "Set ITIMER_REAL failed");

	// CPU Time Limit 
	struct rlimit cpul;
	cpul.rlim_cur = cpul.rlim_max = timeLimit / 1000.0 + 1;
	ERROR_ON(setrlimit(RLIMIT_CPU, &cpul), "ERROR: Set RLIMIT_CPU failed");
	alarm(6);

	// Memory Limit unit: KB
	struct rlimit meml;
	meml.rlim_cur = memLimit * 1024;
	meml.rlim_max = memLimit * 1024 + 1024;
	ERROR_ON(setrlimit(RLIMIT_DATA, &meml), "ERROR: Set RLIMIT_DATA failed");

	// As 
	struct rlimit asl;
	asl.rlim_cur = memLimit * 1024 * 1280;
	asl.rlim_max = memLimit * 1024 * 1280;
	ERROR_ON(setrlimit(RLIMIT_AS, &asl), "ERROR: Set RLIMIT_AS failed");

	// stack
	struct rlimit stal;
	stal.rlim_cur = 256 * 1024 * 1024;
	stal.rlim_max = stal.rlim_cur + 1024;
	ERROR_ON(setrlimit(RLIMIT_STACK, &stal), "ERROR: Set RLIMIT_STACK failed");

	// fsize 
	struct rlimit fszl;
	fszl.rlim_cur = 1024 * 1024 * 40; //40 MB
	fszl.rlim_max = 1024 * 1024 * 40;
	ERROR_ON(setrlimit(RLIMIT_FSIZE, &fszl), "ERROR: Set RLIMIT_FSIZE failed");

	return 0;
}

int main(int argc, char const *argv[])
{
	/* code */

	// redirect std I/O 
	//freopen(REDICT_STDIN, "r", stdin);
	freopen(REDICT_STDOUT, "w", stdout);
	freopen(REDICT_STDERR, "a", stderr);

	printf("~~~~~~~~~~~~~\n");

	char buff[MAX_BUFF_SIZE];
	char *cmdline = buff;
	sprintf(cmdline, cmd[0], "b.cpp", "ox");

	printf("%s\n", cmdline);
	const char *cmdd[] = {"g++", "-std=c++11", "b.cpp", "-o", "ox", NULL};
#ifdef __WINDOWS
	system(cmdline);
	WinExec("out.exe",SW_NORMAL);
#elif __UNIX64
	printf("~~~~~~~~~~~~~\n");
	int pid = fork();
	if(pid == 0)
	{
		int err = execvp("g++", (char* const *)cmdd);
		printf("child~~~~~~~~~~~%d-%d\n", err, errno);	
		exit(0);
	}
	else if(pid > 0)
	{
		int status;
	    waitpid(pid, &status, 0);
		int err = execl("ox", "./ox", NULL);
	    printf("father~~~~~~~~~~~~~%d-%d\n",err, errno);
	    return status;
	}
	else if(pid == -1) 
	{
		ERROR_ON(1, "ERROR: fork() to compile falied");		
	}
	//sleep(5);
	
#endif 
	fclose(stdout);
	fclose(stderr);
	return 0;
}
